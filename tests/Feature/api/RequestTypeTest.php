<?php

use App\Model\API\RequestType;
use App\Model\API\Utils\ParseStringToSearch;

it('REQUEST TYPE - PARSE URL TO SEARCH', function () {
    $to_search_parsed = ParseStringToSearch::parse('lista negra');
    $url_parsed = RequestType::parseURL($to_search_parsed, 'filmes');

    expect($url_parsed)->toBe('https://apicorporation.animes-gt.store/smart-play-+-1.1/requests.php?action=search&q=lista%20negra&t=filmes');
});