<?php

// Controllers
use App\HTTP\Controller\Home;
use App\HTTP\Controller\SearchMovies;
use Slim\App;

/**
 * @var App $app
 */


$app->get('/', [Home::class, 'show']);
$app->post('/movies/search', [SearchMovies::class, 'search']);
