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
        					    'force-ssl'     => 'ssl'
        					],
        				],
        				'may_terminate' => true,
        			],
        		],
        	],
        ],
    ],
];
