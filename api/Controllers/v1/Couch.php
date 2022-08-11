<?php

namespace Api\Controllers\v1;

use Mamluk\Kipchak\Components\Controllers;
use Mamluk\Kipchak\Components\Database\Clients\CouchDB;
use Mamluk\Kipchak\Components\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * All Controllers extending Controllers\Slim Contain the Service / DI Container as a protected property called $container.
 * Access it using $this->container in your controller.
 * Default objects bundled into a container are:
 * logger - which returns an instance of \Monolog\Logger. This is also a protected property on your controller. Access it using $this->logger.
 */

class Couch extends Controllers\Slim
{

    public function get(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $this->logger->debug('Checking Status...');

        /**
         * @var $c CouchDB
         * See couchdb.php in the dependencies folder
         */
        $c = $this->container->get('database.couchdb.default');

        // Call this if the database has not been created.
        $c->createDatabase();

        // Create document content
        $document = json_encode(
            [
                'Allahu' => 'Akbar',
                'Alhamdu' => 'lillah',
                'Subhan' => 'Allah'
            ]
        );

        $c->create('123', $document);

        $c->update('123', $document);

        // $c->delete('123');
        return Http\Response::json($response,
            [
                'document' => $c->read('123')
            ],
            200
        );
    }

}