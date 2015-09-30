<?php

return [
    'controllers' => [
        'invokables' => [
            'UthandoContact\Controller\Contact'     => 'UthandoContact\Mvc\Controller\ContactController',
            'UthandoContact\Controller\Settings'    => 'UthandoContact\Mvc\Controller\Settings',
        ],
    ],
    'form_elements' => [
        'invokables' => [
            'UthandoContact'            => 'UthandoContact\Form\Contact',
            'UthandoContactSettings'    => 'UthandoContact\Form\ContactSettings',
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
