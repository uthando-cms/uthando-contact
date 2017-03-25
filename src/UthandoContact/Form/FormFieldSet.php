<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContact\Form;

use TwbBundle\Form\View\Helper\TwbBundleForm;
use UthandoContact\Options\FormOptions;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Class FormFieldSet
 *
 * @package UthandoContact\Form
 */
class FormFieldSet extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @param null $name
     * @param array $options
     */
    public function __construct($name = null, $options = [])
    {
        if (is_array($name)) {
            $options = $name;
            $name = (isset($options['name'])) ? $options['name'] : null;
        }

        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods())
            ->setObject(new FormOptions());
    }

    public function init()
    {
        $this->add([
            'name' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'Form Name',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'transport_list',
            'options' => [
                'label' => 'Transport List',
                'label_options' => [
                    'disable_html_escape' => true,
                ],
                'count' => 0,
                'should_create_template' => true,
                'allow_add' => true,
                'target_element' => [
                    'type' => AbstractLineFieldSet::class,
                ],
            ],
            'attributes' => [
                'class' => 'col-md-12',
            ],
        ]);

        $this->add([
            'name' => 'send_copy_to_sender',
            'type' => 'radio',
            'options' => [
                'label' => 'Send Copy to Sender',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'enable_captcha',
            'type' => 'radio',
            'options' => [
                'label' => 'Enable Captcha',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'enable_akismet',
            'type' => 'radio',
            'options' => [
                'label' => 'Enable Akismet',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification(): array
    {
        return [
            'name' => [
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    ['name' => 'StringLength', 'options' => [
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 255,
                    ]],
                ],
            ],
            'send_copy_to_sender' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_captcha' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_akismet' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
        ];
    }
}
