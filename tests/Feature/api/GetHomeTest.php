<?php

use App\Model\API\Home\GetHomeMovies;

it('GET HOME API', function () {
    $home = (new GetHomeMovies)->getAll();

    expect($home)->toHaveKey('code', 200);
});