<?php

return [
    'load_uthando_configs' => false,
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
    ],
];
