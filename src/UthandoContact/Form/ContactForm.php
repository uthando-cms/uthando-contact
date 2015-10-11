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
        parent::__construct($name, $options);
    }

    /**
     * Set up form elements
     */
    public function init()
    {

        if (null === $this->getName()) {
            $this->setName('contact');
        }

        $this->add([
            'name' => 'name',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Full name',
                'required' => true,
                'autofocus' => true,
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Name:',
                'required' => true
            ],
        ]);

        $this->add([
            'name' => 'email',
            'type' => 'email',
            'attributes' => [
                'placeholder' => 'Email Address',
                'class' => 'form-control',
                'required' => true
            ],
            'options' => [
                'label' => 'Email:',
                'required' => true
            ],
        ]);

        $this->add([
            'name' => 'subject',
            'type' => 'text',
            'options' => [
                'label' => 'Subject:',
                'required' => true
            ],
            'attributes' => [
                'placeholder' => 'Subject',
                'class' => 'form-control',
                'required' => true
            ],
        ]);

        $this->add([
            'name' => 'transport',
            'type' => 'select',
            'options' => [

            ],
        ]);

        $this->add([
            'name' => 'body',
            'type' => 'textarea',
            'options' => [
                'label' => 'Your Message:',
                'required' => true
            ],
            'attributes' => [
                'placeholder' => 'Your message',
                'required' => true,
                'class' => 'form-control',
                'rows' => 10,
            ],
        ]);

        $this->add([
            'name' => 'captcha',
            'type' => 'UthandoCommonCaptcha',
            'attributes' => [
                'placeholder' => 'Type letters and number here',
                'required' => true,
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Please verify you are human.'
            ],
        ]);

        $this->add([
            'name' => 'csrf',
            'type' => 'csrf',
        ]);
    }
}
