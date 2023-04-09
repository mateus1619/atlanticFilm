<?php

namespace App\Model\API\Utils;

class ParseStringToSearch
{
    /**
     * Method to parse string to search
     *
     * @param string $to_search
     * @return string
     */
    public static function parse(string $to_search): string
    {
        return preg_replace('/[\s]+/', '%20', $to_search);
    }
}
