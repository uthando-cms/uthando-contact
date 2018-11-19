<?php

use UthandoContact\Controller\ContactController;
use UthandoContact\Controller\SettingsController;
use UthandoContact\Form\AbstractLineFieldSet;
use UthandoContact\Form\CompanyFieldSet;
use UthandoContact\Form\ContactForm;
use UthandoContact\Form\ContactSettings;
use UthandoContact\Form\DetailsFieldSet;
use UthandoContact\Form\FormFieldSet;
use UthandoContact\Form\GoogleMapFieldSet;
use UthandoContact\Form\View\Helper\AbstractLineFormCollection;
use UthandoContact\InputFilter\ContactInputFilter;
use UthandoContact\InputFilter\ContactInputFilterFactory;
use UthandoContact\Options\CompanyOptions;
use UthandoContact\Options\DetailsOptions;
use UthandoContact\Options\FormOptions;
use UthandoContact\Options\GoogleMapOptions;
use UthandoContact\Options\Service\CompanyOptionsFactory;
use UthandoContact\Options\Service\DetailsOptionsFactory;
use UthandoContact\Options\Service\FormOptionsFactory;
use UthandoContact\Options\Service\GoogleMapOptionsFactory;
use UthandoContact\ServiceManager\ContactService;
use UthandoContact\View\Helper\Contact;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'invokables' => [
            ContactController::class    => ContactController::class,
            SettingsController::class   => SettingsController::class,
        ],
    ],
    'form_elements' => [
        'factories' => [
            AbstractLineFieldSet::class => InvokableFactory::class,
            CompanyFieldSet::class      => InvokableFactory::class,
            ContactForm::class          => InvokableFactory::class,
            ContactSettings::class      => InvokableFactory::class,
            DetailsFieldSet::class      => InvokableFactory::class,
            FormFieldSet::class         => InvokableFactory::class,
            GoogleMapFieldSet::class    => InvokableFactory::class
        ],
    ],
    'input_filters' => [
        'factories' => [
           ContactInputFilter::class => ContactInputFilterFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            CompanyOptions::class   => CompanyOptionsFactory::class,
            DetailsOptions::class   => DetailsOptionsFactory::class,
            FormOptions::class      => FormOptionsFactory::class,
            GoogleMapOptions::class => GoogleMapOptionsFactory::class,
        ],
        'invokables' => [
            ContactService::class => ContactService::class,
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'contact'                       => Contact::class,
            'abstractLineFormCollection'    => AbstractLineFormCollection::class,
        ],
        'invokables' => [
            Contact::class                      => Contact::class,
            AbstractLineFormCollection::class   => AbstractLineFormCollection::class,
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
                        'controller'    => ContactController::class,
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
