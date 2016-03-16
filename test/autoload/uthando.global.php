<?php

return [
    'load_uthando_configs' => false,
    'php_settings' => [
        'display_startup_errors'        => true,
        'display_errors'                => true,
        'error_reporting'               => E_ALL ^ E_USER_DEPRECATED,
        'max_execution_time'            => 60,
        'date.timezone'                 => 'Europe/London',
        'zlib.output_compression'       => true,
        'zlib.output_compression_level' => -1,
    ],
    'uthando_contact' => [
        'form' => [
            'name' => 'ContactForm',
            'send_copy_to_sender' => true,
            'enable_captcha' => true,
            'enable_akismet' => false,
            'transport_list' => [
                0 => [
                    'label' => 'default',
                    'text'  => 'Default Transport',
                ],
             ],
        ],
        'details' => [
            'name' => 'Example Ltd',
            'phone' => '+441234123456',
            'mobile' => '',
            'fax' => '',
            'email' => 'test@example.com',
            'about_us_text' => '',
            'phone_region' => 'GB',
            'address' => [
                0 => [
                    'label' => 'line1',
                    'text' => 'Fake Street',
                ],
                1 => [
                    'label' => 'town',
                    'text' => 'Bogus Town',
                ],
                2 => [
                    'label' => 'county',
                    'text' => 'Somewhereshire',
                ],
                3 => [
                    'label' => 'postcode',
                    'text' => 'SG11 1AA',
                ],
                4 => [
                    'label' => 'country',
                    'text' => 'UK',
                ],
            ],
            'business_hours' => [
                0 => [
                    'label' => 'Monday',
                    'text' => 'Closed',
                ],
                1 => [
                    'label' => 'Tuesday',
                    'text' => '10am - 4pm',
                ],
                2 => [
                    'label' => 'Wednesday',
                    'text' => 'Closed',
                ],
                3 => [
                    'label' => 'Thursday - Saturday',
                    'text' => '10am - 4pm',
                ],
                4 => [
                    'label' => 'Sunday',
                    'text' => 'Closed',
                ],
            ],
        ],
    ],
];
