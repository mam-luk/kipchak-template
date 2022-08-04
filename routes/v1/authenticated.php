<?php

use Api\Controllers;
use Api\Middlewares;
use Mamaluk\Kipchak\Components\Middlewares\AuthJwks;
use Mamaluk\Kipchak\Components\Middlewares\AuthKey;
use Slim\Routing\RouteCollectorProxy;

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/authenticatedJWKS',
        [
            Controllers\Authenticated::class,
            'getJWKS'
        ]
    );

})->add(new AuthJwks($app->getContainer()));

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/authenticatedKey',
        [
            Controllers\Authenticated::class,
            'getKey'
        ]
    );

})->add(new AuthKey($app->getContainer()));