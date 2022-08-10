<?php

use Api\Controllers;
use Slim\Routing\RouteCollectorProxy;

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/couch',
        [
            Controllers\v1\Couch::class,
            'get'
        ]
    );

});