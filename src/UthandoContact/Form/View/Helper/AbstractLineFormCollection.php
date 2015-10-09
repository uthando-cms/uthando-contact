<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Form\View\Helper
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoContact\Form\View\Helper;

use TwbBundle\Form\View\Helper\TwbBundleFormCollection;
use TwbBundle\Form\View\Helper\TwbBundleFormRow;
use UthandoContact\Form\AbstractLineFieldSet;
use Zend\Form\Element\Collection;
use Zend\Form\ElementInterface;

/**
 * Class PdfTextLineFormCollection
 *
 * @package UthandoDomPdf\Form\View\Helper
 * @method TwbBundleFormRow getElementHelper()
 */
class AbstractLineFormCollection extends TwbBundleFormCollection
{
    /**
     * @var string
     */
    protected static $legendFormat = '';

    /**
     * @var string
     */
    protected static $fieldsetFormat = '%s';

    /**
     * @var string
     */
    protected $collectionWrap = '<table id="%s-table" class="table table-bordered table-condensed">%s</table>';

    /**
     * @var string
     */
    protected $templateWrapper = '<span id="%s-template" data-template="%s"></span>';

    /**
     * @var string
     */
    protected $lineType;

    /**
     * @var string
     */
    protected $rowWrap = '<tr id="%1$s-row-__index__">
    <td>__label__</td>
    <td>__text__</td>
    <td>
        <a id="edit-%1$s-button__index__" href="#%1$s-model__index__" class="text-primary" data-toggle="modal" data-target="#%1$s-model__index__">
            <i class="fa fa-edit fa-2x"></i>
        </a>
        <a id="delete-%1$s-button__index__" href="#" class="text-danger delete-row">
            <i class="fa fa-trash fa-2x"></i>
        </a>
        <div class="modal fade" id="%1$s-model__index__">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3>%3$s Line __index__</h3>
                    </div>
                    <div class="modal-body">%2$s</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>';

    /**
     * @param ElementInterface $oElement
     * @return string
     */
    public function render(ElementInterface $oElement)
    {
        $html = '';

        if ($oElement instanceof Collection) {
            $c = 0;

            foreach ($oElement as $key => $oElementOrFieldset) {
                $oElementHelper = $this->getElementHelper();
                $oFieldSetHelper = $this->getFieldsetHelper();

                if ($oElementOrFieldset instanceof AbstractLineFieldSet) {
                    $format = str_replace('__index__', $key, $this->rowWrap);
                    $format = str_replace('__label__', $oElementOrFieldset->get('label')->getValue(), $format);
                    $format = str_replace('__text__', $oElementOrFieldset->get('text')->getValue(), $format);
                    $html .= sprintf(
                        $format,
                        $this->getLineType(),
                        $oFieldSetHelper($oElementOrFieldset, false),
                        ucfirst($this->getLineType())
                    );
                }

                $c++;
            }

            $html = sprintf($this->collectionWrap, $this->getLineType(), $html);

            if ($oElement instanceof Collection && $oElement->shouldCreateTemplate()) {
                $this->setShouldWrap(false);
                $html .= $this->renderTemplate($oElement);
            }

        } else {
            $html = parent::render($oElement);
        }

        return $html;
    }

    /**
     * Only render a template
     *
     * @param  Collection $collection
     * @return string
     */
    public function renderTemplate(Collection $collection)
    {
        $elementHelper = $this->getElementHelper();
        $escapeHtmlAttribHelper = $this->getEscapeHtmlAttrHelper();
        $fieldsetHelper = $this->getFieldsetHelper();

        $templateMarkup = '';

        $elementOrFieldset = $collection->getTemplateElement();

        if ($elementOrFieldset instanceof AbstractLineFieldSet) {
            $templateMarkup .= sprintf(
                $this->rowWrap,
                $this->getLineType(),
                $fieldsetHelper($elementOrFieldset, $this->shouldWrap()),
                ucfirst($this->getLineType())
            );
        }

        return sprintf(
            $this->getTemplateWrapper(),
            $this->getLineType(),
            $escapeHtmlAttribHelper($templateMarkup)
        );
    }

    /**
     * @return string
     */
    public function getLineType()
    {
        return $this->lineType;
    }

    /**
     * @param string $lineType
     * @return $this
     */
    public function setLineType($lineType)
    {
        $this->lineType = $lineType;
        return $this;
    }
}
