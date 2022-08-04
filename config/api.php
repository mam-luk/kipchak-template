<?php

use Mamaluk\Kipchak\Helpers\Env;

$config['api'] = [
    'name' => 'kipchak-template', // Hyphen or underscore separated string
    'debug' => (bool) Env::get('DEBUG', true),
    // If debug is enabled, loglevel is debug. Otheriwse it is info. Overwrite it by specifying it below.
    // 'loglevel' => \Monolog\Level::Debug
    'auth' => [
        'jwks' => [
            'enabled' => false, // to enable this globally
            'jwksUri' => 'https://auth.islamic.network/auth/realms/islamic-network/protocol/openid-connect/certs',
            'scopes' => [
                'email',
                'profile'
            ],
        ],
        'key' => [
            'enabled' => true, // Will check for key in key query parameter (?key=xxxxxxx) or x-api-key header globally
            'authorised_keys' => [
                'key1',
                'key2',
                'key3'
            ]
        ]


    ]
];