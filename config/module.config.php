<?php

return [
    'controllers' => [
        'invokables' => [
            'UthandoContact\Controller\Contact' => 'UthandoContact\Controller\ContactController',
        ],
    ],
    'service_manager' => [
        'invokables'    => [
            'UthandoContact\InputFilter\Contact'    => 'UthandoContact\InputFilter\Contact',
            'UthandoContact\Service\Contact'        => 'UthandoContact\Service\Contact',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'Contact' => 'UthandoContact\View\Contact',
        ],
    ],
    'view_manager'  => [
        'template_map' => include __DIR__ . '/../template_map.php'
    ],
];
