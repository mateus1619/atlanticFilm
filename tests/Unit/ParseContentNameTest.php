<?php

use App\Model\ParseContentName;

describe('Parse content name', function () {
    it('Content name in capital letters with spaces', function () {
        expect(ParseContentName::parse('LISTA NEGRA'))->toBe('lista%20negra');
    });

    it('Content name in capital letters with space and numbers', function () {
        expect(ParseContentName::parse('LISTA NEGRA 2'))->toBe('lista%20negra%202');
    });

    it('Content name in pascal letters with spaces', function () {
        expect(ParseContentName::parse('Lista Negra'))->toBe('lista%20negra');
    });

    it('Content name in pascal letters with spaces and numbers', function () {
        expect(ParseContentName::parse('Lista Negra 2'))->toBe('lista%20negra%202');
    });

    it('Content name in small letters with space', function () {
        expect(ParseContentName::parse('lista negra'))->toBe('lista%20negra');
    });

    it('Content name in small letters with space and numbers', function () {
        expect(ParseContentName::parse('lista negra 2'))->toBe('lista%20negra%202');
    });
});