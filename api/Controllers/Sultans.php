<?php

namespace Api\Controllers;

use Api\DataTransferObjects\MamlukSultan;
use Mamluk\Kipchak\Components\Controllers;
use Mamluk\Kipchak\Components\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use OpenApi\Attributes as OA;

/**
 * All Contollers extending Controllers\Slim Contain the Service / DI Container as a protected property called $container.
 * Access it using $this->container in your controller.
 * Default objects bundled into a container are:
 * logger - which returns an instance of \Monolog\Logger. This is also a protected property on your controller. Access it using $this->logger.
 */

#[OA\Info(title: "Mamluk Sultans API", version: "0.1")]
class Sultans extends Controllers\Slim
{

    #[OA\Get(path: '/v1/sultans')]
    #[OA\Response(response: '200', description: 'Returns a list of Sultans')]
    public function get(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $this->logger->debug('Checking Status...');

        $sultan1 = new MamlukSultan([
           'yearFrom'   => 1251,
           'yearTo'     => 1257,
            'name'      => 'Qutuz Al Din'
        ]);

        $sultan2 = new MamlukSultan([
            'yearFrom'   => 1257,
            'yearTo'     => 1277,
            'name'      => 'Baybars'
        ]);

        return Http\Response::json($response,
            [
                'sultans' => [$sultan1, $sultan2]
            ],
            200
        );
    }

}