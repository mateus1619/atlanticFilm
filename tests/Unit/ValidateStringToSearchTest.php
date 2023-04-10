<?php

use App\Model\API\Utils\Validations\ValidateStringToSearch;

test('VALIDATE STRING TO SEARCH', function (string $to_search) {
    $validate = ValidateStringToSearch::validate($to_search);

    expect($validate)->toBeArray();
})->with(['lista negra %']);

test('VALIDATE STRING TO SEARCH 2', function (string $to_search) {
    $validate = ValidateStringToSearch::validate($to_search);

    expect($validate)->toBeTrue();
})->with(['lista negra']);