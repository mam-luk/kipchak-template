<?php

namespace Api\Controllers\v1;

use Mamluk\Kipchak\Components\Controllers;
use Mamluk\Kipchak\Components\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Contracts\Cache\ItemInterface;

/**
 * All Controllers extending Controllers\Slim Contain the Service / DI Container as a protected property called $container.
 * Access it using $this->container in your controller.
 * Default objects bundled into a container are:
 * logger - which returns an instance of \Monolog\Logger. This is also a protected property on your controller. Access it using $this->logger.
 */

class Cache extends Controllers\Slim
{

    public function get(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $this->logger->debug('Loading cache');

        $memcached = $this->container->get('cache.memcached.cache');

        $fromMemcached = $memcached->get('kipchak', function (ItemInterface $item) {
            $item->expiresAfter(3600);

            return 'Ehthnic origin of the Mamluks';
        });

        $file = $this->container->get('cache.file');

        $fromFile = $file->get('baybars', function (ItemInterface $item) {
            $item->expiresAfter(3600);

            return 'The general (and eventually Sultan) who defeated the Mongols at Ayn Jalut';
        });

        return Http\Response::json($response,
            [
                'memcached' => $fromMemcached,
                'file' => $fromFile
            ],
            200
        );
    }

}