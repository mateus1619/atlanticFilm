<?php

// Controllers
use App\HTTP\Controller\Home;
use App\HTTP\Controller\ResearchAnime;
use App\HTTP\Controller\ResearchMovies;
use App\HTTP\Controller\ResearchSeries;

// Utils
use Slim\App;

/**
 * @var App $app
 */


$app->get('/', [Home::class, 'show']);
$app->post('/movies/search', [ResearchMovies::class, 'search']);
$app->post('/series/search', [ResearchSeries::class, 'search']);
$app->post('/animes/search', [ResearchAnime::class, 'search']);
