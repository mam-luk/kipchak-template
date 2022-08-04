<?php

use Slim\Routing\RouteCollectorProxy;
use Api\Controllers;

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/status',
        [
            Controllers\Status::class,
            'get'
        ]
    );

});