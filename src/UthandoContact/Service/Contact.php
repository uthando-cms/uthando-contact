<?php

namespace UthandoContact\Service;

use UthandoCommon\Service\AbstractService;
use Zend\Form\Form;

class Contact extends AbstractService
{
    /**
     * @param $data
     * array(
        ['name'] => 'Charisma Beads Ltd'
        ['email'] => 'shaun@shaunfreeman.co.uk'
        ['subject'] => 'About the training'
        ['body'] => 'tets'
        ['captcha'] => array(
            ['id'] => '46e5368415f17e62de2288ce5803f7c4'
            ['input'] => 'h2r5juwi'
        )
        ['csrf'] => '780e663a8f3a548db88a465c66944e44-f135f79e6b704756a8c642d8deec2016'
     )
     */
    public function sendEmail($data)
    {
        if ($data instanceof Form) {
            $data = $data->getData();
        }
        
        //$from    = $data['email'];
        $subject = '[Contact Form] ' . $data['subject'];
        //$body    = $data['body'];

        $data = [
            'sender'    => [
                'name'      => $data['name'],
                'address'   => $data['email']
            ],
            'body'      => $data['body'],
            'subject'   => $subject,
            'transport' => 'default',
        ];

        $this->getEventManager()->trigger('mail.send', $this, $data);
    }
    
    public function getContactForm($data=null)
    {
        $sl = $this->getServiceLocator();
        $formManager = $sl->get('FormElementManager');
        
        $form = $formManager->get('UthandoContact\Form\Contact');
        $form->setInputFilter($sl->get('UthandoContact\InputFilter\Contact'));
        $form->init();
        
        if ($data) {
            $form->setData($data);
        }
        
        return $form;
    }
}
