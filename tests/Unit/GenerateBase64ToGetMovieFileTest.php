<?php

use Service\Util\GenerateBase64ToGetMovieFile;

describe('Generate Base64', function () {
    it('Genrate Base64 - return', function () {
        $hash = GenerateBase64ToGetMovieFile::generateHash(13120, 'serie');
        expect($hash)->toBeString();

        print($hash);
        ob_flush();
    });
});
