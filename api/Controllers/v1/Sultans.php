<?php

namespace Api\Controllers\v1;

use Api\DataTransferObjects\v1\MamlukSultan;
use Mamluk\Kipchak\Components\Controllers;
use Mamluk\Kipchak\Components\Http;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use CuyZ\Valinor as Data;
/**
 * All Controllers extending Controllers\Slim Contain the Service / DI Container as a protected property called $container.
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

        $sultan1 = [
           'yearFrom'   => 1251,
           'yearTo'     => 1257,
            'name'      => 'Qutuz Al Din'
        ];

        $sultan2 = [
            'yearFrom'   => 1257,
            'yearTo'     => 1277,
            'name'      => 'Baybars'
        ];

        $x1 = (new Data\MapperBuilder())
            ->mapper()
            ->map(MamlukSultan::class, Data\Mapper\Source\Source::array($sultan1));

        $x2 = (new Data\MapperBuilder())
            ->mapper()
            ->map(MamlukSultan::class, Data\Mapper\Source\Source::array($sultan2));

        return Http\Response::json($response,
            [
                'sultans' => [$x1, $x2]
            ],
            200
        );
    }

}