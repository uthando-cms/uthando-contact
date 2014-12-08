<?php
namespace UthandoContact\Form;

use Zend\Form\Form;

class Contact extends Form
{   
    public function __construct($name = null)
    {
        parent::__construct($name);
    }
    
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
            'name'  => 'subject',
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
            'name'  => 'body',
            'type'  => 'textarea',
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
            'type' => 'ContactCaptcha',
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
