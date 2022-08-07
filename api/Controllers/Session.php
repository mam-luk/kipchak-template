<?php

namespace Api\Controllers;

use Mamluk\Kipchak\Components\Controllers;
use Mamluk\Kipchak\Components\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Contracts\Cache\ItemInterface;

/**
 * All Contollers extending Controllers\Slim Contain the Service / DI Container as a protected property called $container.
 * Access it using $this->container in your controller.
 * Default objects bundled into a container are:
 * logger - which returns an instance of \Monolog\Logger. This is also a protected property on your controller. Access it using $this->logger.
 */

class Session extends Controllers\Slim
{

    public function get(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $session = $this->container->get('session');
        $session->set('Allahu', 'Akbar');
        $session->set('Alhamdu', 'Lillah');

        return Http\Response::json($response,
            [
                'status' => $session->get('blue'),
                'id' => $session::id(),
                'Allahu' => $session->get('Allahu')
            ],
            200
        );

    }

}