<?php

use App\Model\API\Utils\ParseStringToSearch;

it('PARSE STRING TO SEARCH', function () {
    $string = ParseStringToSearch::parse('lista   negra  ');

    echo $string;
    expect($string)->toBe('lista%20negra%20');
});

it('PARSE STRING TO SEARCH 2', function () {
    $string = ParseStringToSearch::parse('listane gra');

    echo $string;
    expect($string)->toBe('listane%20gra');
});