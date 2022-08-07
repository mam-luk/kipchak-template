<?php
/**
use Psr\Container\ContainerInterface;
use Mamluk\Kipchak\Components\Database\Clients\CouchDB;

$container->set('couchDB', function(ContainerInterface $c) {
    $cc = $c->get('config')['couchdb']['default'];
    $logger = $c->get('logger');

    return new CouchDB($cc['username'], $cc['password'], 'kipchak_api', $cc['host'], $cc['port'], $logger);

});
**/