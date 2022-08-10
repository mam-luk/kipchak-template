<?php

use Api\Controllers;
use Slim\Routing\RouteCollectorProxy;

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/session',
        [
            Controllers\v1\Session::class,
            'get'
        ]
    );

});