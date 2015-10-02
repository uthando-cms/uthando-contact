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
