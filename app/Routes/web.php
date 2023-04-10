<?php

// Controllers

use App\Controller\Anime;
use App\Controller\Home;
use App\Controller\Movie;
use App\Controller\Series;
use Slim\Routing\RouteCollectorProxy;

$app->group('', function(RouteCollectorProxy $router) {

    $router->get('/', [Home::class, 'show']);
    $router->get('/movie', [Movie::class, 'show']);
    $router->get('/series', [Series::class, 'show']);
    $router->get('/anime', [Anime::class, 'show']);
});