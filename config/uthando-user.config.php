<?php

return [
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
];
