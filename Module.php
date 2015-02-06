<?php
namespace UthandoContact;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/config.php';
    }
    
    public function getControllerConfig()
    {
        return [
            'invokables' => [
        	   'UthandoContact\Controller\Contact'    => 'UthandoContact\Controller\ContactController',
           ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'invokables'    => [
                'UthandoContact\InputFilter\Contact'    => 'UthandoContact\InputFilter\Contact',
                'UthandoContact\Service\Contact'        => 'UthandoContact\Service\Contact',
            ],
            'factories'     => [
                'UthandoContact\Service\MailMessage'    => 'UthandoContact\Service\MailMessageFactory',
                'UthandoContact\Service\MailTransport'  => 'UthandoContact\Service\MailTransportFactory',
            ],
        ];
    }

    public function getViewHelperConfig()
    {
        return [
            'invokables' => [
                'Contact' => 'UthandoContact\View\Contact',
            ],
        ];
    }
    
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/autoload_classmap.php'
            ],
        ];
    }
}
