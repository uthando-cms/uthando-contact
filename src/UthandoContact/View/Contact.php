<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\View
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoContact\View;

use TwbBundle\Form\View\Helper\TwbBundleForm;
use UthandoCommon\View\AbstractViewHelper;
use Zend\Config\Config;
use Zend\Form\FormElementManager;

/**
 * Class Contact
 *
 * @package UthandoContact\View
 */
class Contact extends AbstractViewHelper
{
    /**
     * @var Config
     */
    protected $contactConfig;

    /**
     * @param null $key
     * @return $this|Config|string
     */
    public function __invoke($key = null)
    {
        if (!$this->contactConfig instanceof Config) {
            $config = $this->getConfig('uthando_contact');

            if (!$config instanceof Config) {
                $config = new Config($config);
            }

            $this->contactConfig = $config;
        }

        if (is_string($key)) {
            return $this->get($key);
        }

        return $this;
    }

    /**
     * @param $key
     * @return Config|string|null
     */
    public function get($key)
    {
        $keys = explode('.', $key);
        $returnValue = null;
        $config = $this->contactConfig;

        foreach ($keys as $key) {

            $returnValue = $config->get($key);

            if ($returnValue instanceof Config) {
                $config = $returnValue;
            }
        }

        return $returnValue;
    }

    /**
     * @return \UthandoMail\Form\Element\MailTransportList
     */
    public function getTransportSelect()
    {
        /* @var FormElementManager $formManager */
        $formManager = $this->getServiceLocator()
            ->getServiceLocator()
            ->get('FormElementManager');
        $select = $formManager->get('UthandoMailTransportList');
        $select->setName('transport_options');
        $select->setOptions([
            'label'	=> 'Email',
            'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
            'column-size' => 'md-10',
            'label_attributes' => [
                'class' => 'col-md-2',
            ],
        ]);
        $select->setAttribute('id', 'mail-transport-select');
        return $select;
    }

    /**
     * @return string
     */
    public function businessHours()
    {
        $businessHours  = $this->get('details.business_hours');
        $html           = '';

        foreach ($businessHours as $daysAndHours) {
            $html .= '<span class="block"><strong>' . $daysAndHours['label'] . ':</strong> ' . $daysAndHours['text'] . '</span>';
        }

        return $html;
    }

    /**
     * @param $address
     * @param bool|false $newLines
     * @return mixed|string
     */
    public function formatAddress($address, $newLines = false)
    {
        $address    = $this->get($address);
        $html       = '';

        foreach($address as $key => $line) {
            $html .= $line['text'] . ', ';
        }

        $html = rtrim($html, ', ');

        if (true === $newLines) {
            $html = str_replace(',', '<br />', $html);
        }

        return $html;
    }
}
