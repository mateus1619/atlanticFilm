<?php

namespace App\Model\API\Utils\Validations;

class ValidateStringToSearch
{
    /**
     * Method to validate string to search
     *
     * @param string $to_search
     * @return array|boolean
     */
    public static function validate(string $to_search): array|bool
    {
        if (strlen($to_search) > 20) {
            return [
                'code' => 400,
                'message' => 'Muito grande para pesquisar'
            ];
        }
        if (empty($to_search)) {
            return [
                'code' => 400,
                'message' => 'Preencha o campo de busca'
            ];
        }

        preg_match('/[^a-z0-9\s]+/', $to_search, $matches);
        if (!empty($matches)) {
            return [
                'code' => 400,
                'message' => 'Caracteres não permitidos'
            ];
        }

        return true;
    }
}
