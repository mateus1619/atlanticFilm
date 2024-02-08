<?php

namespace App\Model;

class ParseContentName
{
    /**
     * Parse content name for search patterns
     *
     * @param string $content_name
     * @return string
     */
    public static function parse(string $content_name): string
    {
        $content_name = strtolower($content_name);
        return rawurlencode($content_name);
    }
}
