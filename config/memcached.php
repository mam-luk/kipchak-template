<?php

use function Mamluk\Kipchak\env;

return [
    'default' => [
        'host' => env('MEMCACHED_HOST', 'memcached'),
        'port' => env('MEMCACHED_PORT', 11211),
    ]
];

