<?php

use function Mamluk\Kipchak\env;

return [
    'connections' => [
        'default' => [
            'host' => env('COUCHDB_HOST', 'http://couchdb'), # No trailing slash, please.
            'port' => (int) env('COUCHDB_PORT', 5984),
            'username' => env('COUCHDB_USER', 'api'),
            'password' => env('COUCHDB_PASSWORD', 'api'),
        ]
    ]
];