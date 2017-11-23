<?php

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
        						'__NAMESPACE__' => 'UthandoContact\Mvc\Controller',
        						'controller'    => 'SettingsController',
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
