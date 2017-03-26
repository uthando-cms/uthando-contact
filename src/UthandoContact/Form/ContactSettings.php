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
            'type' => FormFieldSet::class,
            'name' => 'form',
            'options' => [
                'label' => 'Form Options',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'type' => DetailsFieldSet::class,
            'name' => 'details',
            'options' => [
                'label' => 'Details',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'type' => CompanyFieldSet::class,
            'name' => 'company',
            'options' => [
                'label' => 'Company',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'type' => GoogleMapFieldSet::class,
            'name' => 'google_map',
            'options' => [
                'label' => 'Google Map',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);
    }
}
