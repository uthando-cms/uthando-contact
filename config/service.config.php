<?php

return [
    'shared'        => [
        'UthandoContact\Form\Contact'           => false,
    ],
    'invokables'    => [
        'UthandoContact\Form\Contact'           => 'UthandoContact\Form\Contact',
        
        'UthandoContact\InputFilter\Contact'    => 'UthandoContact\InputFilter\Contact',
        
        'UthandoContact\Service\Contact'        => 'UthandoContact\Service\Contact',
    ],
    'factories'     => [
        'UthandoContact\Service\Captcha'        => 'UthandoContact\Service\CaptchaFactory',
        'UthandoContact\Service\MailMessage'    => 'UthandoContact\Service\MailMessageFactory',
        'UthandoContact\Service\MailTransport'  => 'UthandoContact\Service\MailTransportFactory',
    ],
];
