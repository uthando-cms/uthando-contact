<?php

use UthandoContact\Form\View\Helper\AbstractLineFormCollection;
use UthandoContact\InputFilter\ContactInputFilter;
use UthandoContact\InputFilter\ContactInputFilterFactory;
use UthandoContact\Mvc\Controller\ContactController;
use UthandoContact\Mvc\Controller\SettingsController;
use UthandoContact\Options\FormOptions;
use UthandoContact\ServiceManager\ContactService;
use UthandoContact\ServiceManager\FormOptionsFactory;
use UthandoContact\View\Helper\Contact;

return [
    'controllers' => [
        'invokables' => [
            ContactController::class    => ContactController::class,
            SettingsController::class   => SettingsController::class,
        ],
    ],
    'input_filters' => [
        'factories' => [
           ContactInputFilter::class => ContactInputFilterFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            FormOptions::class    => FormOptionsFactory::class,
        ],
        'invokables' => [
            ContactService::class => ContactService::class,
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'Contact'                       => Contact::class,
            'AbstractLineFormCollection'    => AbstractLineFormCollection::class,
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
                        '__NAMESPACE__' => 'UthandoContact\Mvc\Controller',
                        'controller'    => 'ContactController',
                        'action'        => 'index',
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
