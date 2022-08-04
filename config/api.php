<?php

use Mamaluk\Kipchak\Helpers\Env;

$config['api'] = [
    'debug' => (bool) Env::get('DEBUG', true),
    // If debug is enabled, loglevel is debug. Otheriwse it is info. Overwrite it by specifying it below.
    // 'loglevel' => \Monolog\Level::Debug
    'auth' => [
        'jwks' => [
            'enabled' => false,
            'jwksUri' => 'https://auth.islamic.network/auth/realms/islamic-network/protocol/openid-connect/certs',
            'scopes' => [
                'email',
                'profile'
            ],
        ],
        'key' => [
            'enabled' => true, // Will check for key in key query parameter (?key=xxxxxxx) or x-api-key header
            'authorised_keys' => [
                'key1',
                'key2',
                'key3'
            ]
        ]


    ]
];