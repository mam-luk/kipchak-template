<?php

use Mamaluk\Kipchak\Helpers\Env;

$config ['memached'] = [
    'default' => [
        'host' => Env::get('MEMCACHED_HOST', 'memcached'),
        'port' => Env::get('MEMCACHED_PORT', 11211),
    ]
];

