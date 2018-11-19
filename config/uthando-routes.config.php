<?php

use UthandoContact\Controller\SettingsController;

return [
    'router' => [
        'routes' => [
            'admin' => [
        		'child_routes' => [
        			'contact' => [
        				'type'    => 'Segment',
        				'options' => [
        					'route'    => '/contact',
        					'defaults' => [
        						'__NAMESPACE__' => 'UthandoContact\Controller',
        						'controller'    => SettingsController::class,
        						'action'        => 'index',
        					],
        				],
        				'may_terminate' => true,
        			],
        		],
        	],
        ],
    ],
];
