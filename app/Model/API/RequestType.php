<?php

namespace App\Model\API;

class RequestType
{
    /**
     * Method to return URL parsed foreach type
     *
     * @param string $search
     * @param string $type
     * @return string
     */
    public static function parseURL(string $search, string $type): string
    {
        return STREAMING_API . 'action=search&q=' . $search . '&t=' . $type;
    }
}
