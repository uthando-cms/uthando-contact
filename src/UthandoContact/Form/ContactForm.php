<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContact\Form;

use TwbBundle\Form\View\Helper\TwbBundleForm;
use UthandoContact\Model\AbstractLine;
use Zend\Form\Form;

/**
 * Class ContactForm
 *
 * @package UthandoContact\Form
 */
class ContactForm extends Form
{
    /**
     * @param null $name
     * @param array $options
     */
    public function __construct($name = null, $options = [])
    {
        if (isset($options['name'])) {
            $name = $options['name'];
            unset($options['name']);
        }

        parent::__construct($name, $options);
    }

    /**
     * Set up form elements
     */
    public function init()
    {
        $this->add([
            'name' => 'name',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Full Name',
                'autofocus' => true,
            ],
            'options' => [
                'label' => 'Name',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'sm-10',
                'label_attributes' => [
                    'class' => 'col-sm-2',
                ],
            ],
        ]);

        $this->add([
            'name' => 'email',
            'type' => 'email',
            'attributes' => [
                'placeholder' => 'Email Address',
            ],
            'options' => [
                'label' => 'Email',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'sm-10',
                'label_attributes' => [
                    'class' => 'col-sm-2',
                ],
            ],
        ]);

        $this->add([
            'name' => 'subject',
            'type' => 'text',
            'options' => [
                'label' => 'Subject',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'sm-10',
                'label_attributes' => [
                    'class' => 'col-sm-2',
                ],
            ],
            'attributes' => [
                'placeholder' => 'Subject',
            ],
        ]);

        $this->add([
            'name' => 'transport',
            'type' => 'select',
            'options' => [
                'label' => 'Department',
                'value_options' => $this->getTransportList(),
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'sm-10',
                'label_attributes' => [
                    'class' => 'col-sm-2',
                ],
            ],
        ]);

        $this->add([
            'name' => 'body',
            'type' => 'textarea',
            'options' => [
                'label' => 'Message',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'sm-10',
                'label_attributes' => [
                    'class' => 'col-sm-2',
                ],
            ],
            'attributes' => [
                'placeholder' => 'Your message',
                'rows' => 10,
            ],
        ]);

        if (true === $this->getOption('enable_captcha')) {
            $this->add([
                'name' => 'captcha',
                'type' => 'UthandoCommonCaptcha',
                'attributes' => [
                    'placeholder' => 'Type letters and number here',
                ],
                'options' => [
                    'label' => 'Please verify you are human',
                    'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                    'column-size' => 'sm-10 col-sm-offset-2',
                    'label_attributes' => [
                        'class' => 'col-sm-10 col-sm-offset-2',
                    ],
                ],
            ]);
        }

        $this->add([
            'name' => 'csrf',
            'type' => 'csrf',
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'id' => 'contact-submit-button',
                'class' => 'btn btn-primary',
            ],
            'options' => [
                'label' => 'Send',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'sm-10 col-sm-offset-2',
            ]
        ]);
    }

    /**
     * @return array
     */
    public function getTransportList()
    {
        $list           = $this->getOption('transport_list');
        $listOptions    = [];

        /*  @var AbstractLine $transport */
        foreach($list as $transport) {
            $listOptions[$transport->getLabel()] = $transport->getText();
        }

        return$listOptions;
    }
}
