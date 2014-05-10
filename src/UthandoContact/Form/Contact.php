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
                'placeholder' => 'Name:',
                'required' => true,
                'autofocus' => true,
                'class' => 'input-xlarge',
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
                'placeholder' => 'Email:',
                'class' => 'input-xlarge',
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
                'placeholder' => 'Subject:',
                'class' => 'input-xlarge',
                'required' => true
            ],
        ]);
        
        $this->add([
            'name'  => 'body',
            'type'  => 'textarea',
            'options' => [
                'label' => 'Your message:',
                'required' => true
            ],
            'attributes' => [
                'placeholder' => 'Your Message:',
                'required' => true,
                'class' => 'span6',
                'rows' => 10,
            ],
        ]);
    
        $this->add([
            'name' => 'captcha',
            'type' => 'ContactCaptcha',
            'options' => [
                'label' => 'Please verify you are human.'
            ],
        ]);
    
        $this->add([
            'name' => 'csrf',
            'type' => 'csrf',
        ]);
    
        $this->add([
            'name' => 'Send',
            'type'  => 'submit',
            'attributes' => [
                'value' => 'Send',
            ],
        ]);
    }
}
