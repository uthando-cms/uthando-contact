<?php

use UthandoContact\Controller\ContactController;
use UthandoContact\Controller\SettingsController;

return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'guest' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                ContactController::class => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                SettingsController::class => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                ContactController::class,
                SettingsController::class,
            ],
        ],
    ],
];
