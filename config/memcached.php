<?php

use function Mamluk\Kipchak\env;

return [
    [
        'host' => env('MEMCACHED_HOST', 'memcached'),
        'port' => env('MEMCACHED_PORT', 11211),
    ]
];

