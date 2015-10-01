<?php
return [
    'modules' => [
        'Application',
        'UthandoContact',
        'UthandoCommon',
    ],
    'module_listener_options' => [
        'config_glob_paths' => [
            __DIR__ . '/autoload/{,*.}{global,local}.php',
        ],
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