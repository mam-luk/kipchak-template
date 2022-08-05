<?php
/**
Use Monolog\Logger;
use Monolog\Level;
Use Monolog\Handler\StreamHandler;
use Psr\Container\ContainerInterface;
use function Mamluk\Kipchak\Components\Helpers\env;

$container->set('log', function(ContainerInterface $c) {
    $log = $c->get('logger');
    $debug = env('api')['debug'];
    $logLevel = $debug === true ? Level::Debug : Level::Info;
    $log = new Logger('Api');
    $log->pushHandler( new StreamHandler('php://stdout', $logLevel));

    return $log;
});
*/