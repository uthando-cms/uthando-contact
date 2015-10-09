<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoContact\Form;

use Zend\Form\Form;

/**
 * Class ContactSettings
 *
 * @package UthandoContact\Form
 */
class ContactSettings extends Form
{
    public function init()
    {
        $this->add([
            'type' => 'UthandoContactFormFieldSet',
            'name' => 'form',
            'options' => [
                'label' => 'Form Options',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'type' => 'UthandoContactDetailsFieldSet',
            'name' => 'details',
            'options' => [
                'label' => 'Details',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'type' => 'UthandoContactCompanyFieldSet',
            'name' => 'company',
            'options' => [
                'label' => 'Company',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'type' => 'UthandoContactGoogleMapFieldSet',
            'name' => 'google_map',
            'options' => [
                'label' => 'Google Map',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'name' => 'button-submit',
            'type' => 'submit',
            'attributes' => [
                'type' => 'submit',
                'class' => 'btn-primary'
            ],
            'options' => [
                'label' => 'Save',
                'column-size' => 'md-6'
            ],
        ]);
    }
}
