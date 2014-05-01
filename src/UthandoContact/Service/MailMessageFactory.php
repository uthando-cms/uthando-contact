<?php

namespace UthandoContact\Service;

use Zend\Mail\Message;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MailMessageFactory implements FactoryInterface
{
    
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config  = $serviceLocator->get('config');
        
        $config  = $config['contact']['message'];
        
        $message = new Message();
        
        if (isset($config['to'])) {
            $message->addTo($config['to']);
        }
        
        if (isset($config['from'])) {
            $message->addFrom($config['from']);
        }
        
        if (isset($config['sender']) && isset($config['sender']['address'])) {
            $address = $config['sender']['address'];
            $name    = isset($config['sender']['name']) ? $config['sender']['name'] : null;
            $message->setSender($address, $name);
        }
        
        return $message;
    }
}
