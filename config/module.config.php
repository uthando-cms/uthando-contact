<?php

return [
    'contact' => [
        'captcha' => [
            'class' => 'dumb'
        ],
        'form' => [
            'name' => 'contact'
        ],
        'mail_transport' => [
            'class' => 'Zend\Mail\Transport\SendMail'
        ],
        'message' => [
            // These can be either a string, or an array of email => name pairs
            'to' => 'user@example.com',
            'from' => 'user@example.com',
            // This should be an array with minimally an "address" element, and
            // can also contain a "name" element
            'sender' => [
                'address' => 'user@example.com'
            ]
        ],
        'details' => [
            'name' => '',
            'address' => [
                'line1' => '',
                'line2' => '',
                'town' => '',
                'county' => '',
                'postcode' => '',
                'country' => ''
            ],
            'phone' => '',
            'fax' => '',
            'mobile' => '',
            'email' => ''
        ],
    ],
    'userAcl' => [
        'userRoles' => [
            'guest' => [
                'privileges' => [
                    ['controller' => 'UthandoContact\Controller\Captcha', 'action' => 'all'],
                    ['controller' => 'UthandoContact\Controller\Contact', 'action' => 'all'],
                ],
            ],
            'registered' => [
                'privileges' => [
                    ['controller' => 'UthandoContact\Controller\Captcha', 'action' => 'all'],
                    ['controller' => 'UthandoContact\Controller\Contact', 'action' => 'all'],
                ],
            ],
        ],
        'userResources' => [
            'UthandoContact\Controller\Captcha',
            'UthandoContact\Controller\Contact',
        ],
    ],
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
                    'captcha-form-generate' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/captcha/[:id]',
                            'defaults' => [
                                'controller'    => 'Captcha',
                                'action'        => 'generate'
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'navigation' => [
        'default' => [
            'contact' => [
                'label' => 'Contact',
                'route' => 'contact',
            ],
        ],
    ],
    'view_manager'  => [
        'template_map' => include __DIR__ . '/../template_map.php'
    ],
];
