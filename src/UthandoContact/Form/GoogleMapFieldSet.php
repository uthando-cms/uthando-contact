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
use UthandoContact\Options\GoogleMapOptions;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Class GoogleMapFieldSet
 *
 * @package UthandoContact\Form
 */
class GoogleMapFieldSet extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @param null $name
     * @param array $options
     */
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods())
            ->setObject(new GoogleMapOptions());
    }

    /**
     * Set up elements
     */
    public function init()
    {
        $this->add([
            'name'			=> 'show_map',
            'type'			=> 'checkbox',
            'options'		=> [
                'label'			=> 'Show Map',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
                'required' 		=> false,
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'sm-8 col-sm-offset-4',
            ],
        ]);

        $this->add([
            'name' => 'latitude',
            'type' => 'text',
            'options' => [
                'label' => 'Latitude',
                'column-size' => 'md-8',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'longitude',
            'type' => 'text',
            'options' => [
                'label' => 'Longitude',
                'column-size' => 'md-8',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'zoom',
            'type' => 'number',
            'options' => [
                'label' => 'Zoom',
                'column-size' => 'md-8',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
            'attributes' => [
                'min' => '0',
                'max' => '20',
            ],
        ]);

        $this->add([
            'name' => 'color',
            'type' => 'text',
            'options' => [
                'label' => 'Color',
                'column-size' => 'md-8',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'show_map' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'latitude' => [
                'required' => false,
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
            'longitude' => [
                'required' => false,
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
            'zoom' => [
                'required' => false,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'ToInt'],
                ],
                'validators' => [
                    ['name' => 'Between', 'options' => [
                        'min' => 1,
                        'max' => 20,
                        'inclusive' => true
                    ]],
                ],
            ],
            'color' => [
                'required' => false,
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
        ];
    }
}
