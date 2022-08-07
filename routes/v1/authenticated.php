<?php

use Api\Controllers;
use Mamluk\Kipchak\Components\Middlewares\AuthJwks;
use Mamluk\Kipchak\Components\Middlewares\AuthKey;
use Slim\Routing\RouteCollectorProxy;

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/authJWKS',
        [
            Controllers\Authenticated::class,
            'getJWKS'
        ]
    );

})->add(new AuthJwks($app->getContainer()));

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/authKey',
        [
            Controllers\Authenticated::class,
            'getKey'
        ]
    );

})->add(new AuthKey($app->getContainer()));