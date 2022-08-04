<?php

namespace Api\Controllers;

use Mamaluk\Kipchak\Components\Controllers;
use Mamaluk\Kipchak\Components\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * All Contollers extending Controllers\Slim Contain the Service / DI Container as a protected property called $container.
 * Access it using $this->container in your controller.
 * Default objects bundled into a container are:
 * logger - which returns an instance of \Monolog\Logger. This is also a protected property on your controller. Access it using $this->logger.
 */
class Authenticated extends Controllers\Slim
{

    public function getJWKS(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $this->logger->debug('Checking JWT...');

        return Http\Response::json($response,
            [
                'status' => 'authenticatedJWKS'
            ],
            200
        );
    }

    public function getKey(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $this->logger->debug('Checking Key...');

        return Http\Response::json($response,
            [
                'status' => 'authenticatedKey'
            ],
            200
        );
    }

}