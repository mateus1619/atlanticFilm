<?php

use App\Controller\Home;
use Slim\Routing\RouteCollectorProxy;

$app->group('', function(RouteCollectorProxy $router) {
    $router->get('/', [Home::class, 'show']);
});