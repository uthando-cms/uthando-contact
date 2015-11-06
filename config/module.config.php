<?php

return [
    'controllers' => [
        'invokables' => [
            'UthandoContact\Controller\Contact'     => 'UthandoContact\Mvc\Controller\ContactController',
            'UthandoContact\Controller\Settings'    => 'UthandoContact\Mvc\Controller\SettingsController',
        ],
    ],
    'form_elements' => [
        'invokables' => [
            'UthandoContact'                            => 'UthandoContact\Form\ContactForm',
            'UthandoContactAbstractLineFieldSet'        => 'UthandoContact\Form\AbstractLineFieldSet',
            'UthandoContactCompanyFieldSet'             => 'UthandoContact\Form\CompanyFieldSet',
            'UthandoContactDetailsFieldSet'             => 'UthandoContact\Form\DetailsFieldSet',
            'UthandoContactFormFieldSet'                => 'UthandoContact\Form\FormFieldSet',
            'UthandoContactGoogleMapFieldSet'           => 'UthandoContact\Form\GoogleMapFieldSet',
            'UthandoContactSettings'                    => 'UthandoContact\Form\ContactSettings',
        ],
    ],
    'input_filters' => [
        'invokables' => [
            'UthandoContact\InputFilter\Contact' => 'UthandoContact\InputFilter\ContactInputFilter',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'UthandoContact\Options\FormOptions'    => 'UthandoContact\ServiceManager\FormOptionsFactory',
        ],
        'invokables'    => [
            'UthandoContact\Service\Contact' => 'UthandoContact\ServiceManager\ContactService',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'Contact'                       => 'UthandoContact\View\Helper\Contact',
            'AbstractLineFormCollection'    => 'UthandoContact\Form\View\Helper\AbstractLineFormCollection',
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
                'label' => 'ContactService',
                'route' => 'contact',
            ],
        ],
    ],
];
