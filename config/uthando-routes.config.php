<?php

return [
    'router' => [
        'routes' => [
            'contact' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/contact',
                    'defaults' => [
                        '__NAMESPACE__' => 'UthandoContact\Controller',
                        'controller'    => 'Contact',
                        'action'        => 'index',
                        'force-ssl'     => 'ssl'
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'process' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/process',
                            'defaults' => [
                                'action' => 'process'
                            ],
                        ],
                    ],
                    'thank-you' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/thank-you',
                            'defaults' => [
                                'action' => 'thank-you'
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
