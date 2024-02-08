<?php

use App\Model\Validations\User\ValidateContentName;

describe('Validate content name - invalid', function () {
    it('Content name very big - invalid', function () {
        $content_name = ValidateContentName::validateName('Lista jadslkfajdfçlkadjfçakldjfaçldfaçl');

        expect($content_name)->toBeNull();
    });

    it('Content name very small - invalid', function () {
        $content_name = ValidateContentName::validateName('L');

        expect($content_name)->toBeNull();
    });
});

describe('Validate content name - valid', function () {
    it('Valid content name - word and spaces', function () {
        $content_name = ValidateContentName::validateName('Lista negra');

        expect($content_name)->toBeString();
    });

    it('Valid content name - word and numbers', function () {
        $content_name = ValidateContentName::validateName('Lista2');

        expect($content_name)->toBeString();
    });

    it('Valid content name - word, numbers and spaces', function () {
        $content_name = ValidateContentName::validateName('Batman 2');

        expect($content_name)->toBeString();
    });
});