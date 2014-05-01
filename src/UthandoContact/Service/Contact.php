<?php

namespace UthandoContact\Service;

use Zend\Form\Form;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class Contact implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;
    
    public function sendEmail($data)
    {
        if ($data instanceof Form) {
            $data = $data->getData();
        }
        
        $from    = $data['email'];
        $subject = '[Contact Form] ' . $data['subject'];
        $body    = $data['body'];
        
        $this->getServiceLocator()
            ->get('UthandoContact\Service\MailMessage')
            ->addFrom($from)
            ->addReplyTo($from)
            ->setSubject($subject)
            ->setBody($body);
        
        $this->getServiceLocator()
            ->get('UthandoContact\Service\MailTransport')
            ->send($this->message);
    }
    
    public function getContactForm($data=null)
    {
        $sl = $this->getServiceLocator();
        
        $form = $sl->get('UthandoContact\Form\Contact');
        $form->setInputFilter($sl->get('UthandoContact\InputFilter\Contact'));
        $form->init();
        
        if ($data) {
            $form->setData($data);
        }
        
        return $form;
    }
}
