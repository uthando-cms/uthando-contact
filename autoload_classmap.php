<?php

return [
    'UthandoContact\Module'                         => __DIR__ . '/Module.php',
    
    'UthandoContact\Controller\CaptchaController'   => __DIR__ . '/src/UthandoContact/Controller/CaptchaController.php',
    'UthandoContact\Controller\ContactController'   => __DIR__ . '/src/UthandoContact/Controller/ContactController.php',
    
    'UthandoContact\Form\Element\Captcha'           => __DIR__ . '/src/UthandoContact/Form/Element/Captcha.php',
    'UthandoContact\Form\Contact'                   => __DIR__ . '/src/UthandoContact/Form/Contact.php',
    
    'UthandoContact\InputFilter\Contact'             => __DIR__ . '/src/UthandoContact/InputFilter/Contact.php',
    
    'UthandoContact\Service\Contact'                => __DIR__ . '/src/UthandoContact/Service/Contact.php',
    'UthandoContact\Service\MailMessageFactory'     => __DIR__ . '/src/UthandoContact/Service/MailMessageFactory.php',
    'UthandoContact\Service\MailTransportFactory'   => __DIR__ . '/src/UthandoContact/Service/MailTransportFactory.php',
    
    'UthandoContact\View\Contact'                   => __DIR__ . '/src/UthandoContact/View/Contact.php',
];
