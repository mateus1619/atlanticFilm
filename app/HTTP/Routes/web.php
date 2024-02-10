<?php

// Controllers

use App\HTTP\Controller\GetVideoFile;
use App\HTTP\Controller\Home;
use App\HTTP\Controller\ResearchAnimes;
use App\HTTP\Controller\ResearchMovies;
use App\HTTP\Controller\ResearchSeries;
use App\HTTP\Controller\MovieInfo;


// Utils
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

/**
 * @var App $app
 */


$app->get('/', [Home::class, 'show']);

// to search movie/serie/anime
$app->group('/search', function (RouteCollectorProxy $router) { 
    $router->post('/movies', [ResearchMovies::class, 'search']);
    $router->post('/series', [ResearchSeries::class, 'search']);
    $router->post('/animes', [ResearchAnimes::class, 'search']);
});

// to get info and watch movie/serie/anime
$app->group('', function (RouteCollectorProxy $router) {
    $router->get('/content/{id:[0-9]+}[/{season:[0-9]+}]', [MovieInfo::class, 'getInfo']);
    $router->get('/watch/{type:[a-z]{5}}/{video_id:[0-9]+}', [GetVideoFile::class, 'getFile']);
});


