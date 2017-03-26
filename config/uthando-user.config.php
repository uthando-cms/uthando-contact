<?php

return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'guest' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                \UthandoContact\Mvc\Controller\ContactController::class => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                \UthandoContact\Mvc\Controller\SettingsController::class => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                \UthandoContact\Mvc\Controller\ContactController::class,
                \UthandoContact\Mvc\Controller\SettingsController::class,
            ],
        ],
    ],
];
