<?php

namespace App\Model\Validations\User;

class ValidateContentName
{
    /**
     * Validate content name sent from user
     *
     * @param string $content_name
     * @return string|null
     */
    public static function validateName(string $content_name): ?string
    {
        if (empty($content_name) || strlen($content_name) > 20) return null;
        $content_name = filter_var($content_name, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^([a-zA-z0-9\s]{2,20})$/'
            ]
        ]);

        if ($content_name == false) return null;

        return $content_name;
    }
}
