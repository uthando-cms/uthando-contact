<?php

return [
    'navigation' => [
        'default' => [
            'contact' => [
                'label' => 'Contact',
                'route' => 'contact',
            ],
        ],
        'admin' => [
            'admin' => [
                'pages' => [
                    'settings' => [
                        'pages' => [
                            'contact-settings' => [
                                'label' => 'Contact',
                                'action' => 'index',
                                'route' => 'admin/contact',
                                'resource' => 'menu:admin',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
