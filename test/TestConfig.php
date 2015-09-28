<?php
return [
    'modules' => [
        'Application',
        'UthandoContact',
        'UthandoCommon',
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './devmodules',
            './vendor',
        ],
    ],
    'service_manager' => [
        'use_defaults' => true,
        'invokables' => [
            'ModuleRouteListener' => 'Zend\Mvc\ModuleRouteListener',
        ],
        'factories' => [
            'Navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ],
    ],
];