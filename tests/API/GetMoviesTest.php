<?php

use Service\API\GetMovies;

describe('Get movies', function () {
    it ('Get non-existing moive', function () {
        $movie = GetMovies::getMovies(rawurlencode('Lista negra'));

        expect($movie['code']->value)->toBe(5);
    });

    it ('Get existing moive', function () {
        $movie = GetMovies::getMovies(rawurlencode('Batman'));

        expect($movie['code'])->toBe(200);
    });
});