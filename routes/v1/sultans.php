<?php

use Api\Controllers;
use Slim\Routing\RouteCollectorProxy;

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/sultans',
        [
            Controllers\v1\Sultans::class,
            'get'
        ]
    );

});