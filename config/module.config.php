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
            'UthandoContact'                            => 'UthandoContact\Form\Contact',
            'UthandoContactAddressLineFieldSet'         => 'UthandoContact\Form\AddressLineFieldSet',
            'UthandoContactCompanyOptionsFieldSet'      => 'UthandoContact\Form\CompanyOptionsFieldSet',
            'UthandoContactDetailsOptionsFieldSet'      => 'UthandoContact\Form\DetailsOptionsFieldSet',
            'UthandoContactFormOptionsFieldSet'         => 'UthandoContact\Form\FormOptionsFieldSet',
            'UthandoContactGoogleMapOptionsFieldSet'    => 'UthandoContact\Form\GoogleMapOptionsFieldSet',
            'UthandoContactSettings'                    => 'UthandoContact\Form\ContactSettings',
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
