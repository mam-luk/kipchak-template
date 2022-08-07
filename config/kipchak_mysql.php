<?php

use function Mamluk\Kipchak\env;

return [
    'default' => [
        'host' => env('DB_HOST', 'database'),
        'port' => (int) env('DB_PORT', 3306),
        'name' => env('DB_NAME', 'api'),
        'user' => env('DB_USER', 'api'),
        'password' => env('DB_PASSWORD', 'api'),
        'driver' => env('DB_DRIVER', 'mysql'),
    ]
];