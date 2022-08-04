<?php

use Mamaluk\Kipchak\Helpers\Env;

$config['database'] = [
    'default' => [
        'host' => Env::get('DB_HOST', 'database'),
        'port' => (int) Env::get('DB_PORT', 3306),
        'name' => Env::get('DB_NAME', 'api'),
        'user' => Env::get('DB_USER', 'api'),
        'password' => Env::get('DB_PASSWORD', 'api'),
        'driver' => Env::get('DB_DRIVER', 'mysql'),
    ]
];