<?php

return [
    'contact' => [
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
            'name' => 'Joe Blogs',
            'address' => [
                'line1' => '1 Fake street',
                'line2' => '',
                'town' => 'Bogusville',
                'county' => 'Bluffshire',
                'postcode' => 'AA12 2BC',
                'country' => 'Shady Land'
            ],
            'phone' => '01234 567890',
            'fax' => '',
            'mobile' => '',
            'email' => 'job@blogs.wobble'
        ],
    ],
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'guest' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                'UthandoContact\Controller\Contact' => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                'UthandoContact\Controller\Contact',
            ],
        ],
    ],
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
    'navigation' => [
        'default' => [
            'contact' => [
                'label' => 'Contact',
                'route' => 'contact',
            ],
        ],
    ],
];
