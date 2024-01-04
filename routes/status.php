<?php
use Api\Controllers;

/**
 * @var \Slim\App $app
 */
$app->get('/status',
    [
        Controllers\Status::class,
        'get'
    ]
);

