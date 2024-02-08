<?php

namespace App\HTTP\Controller;

use App\Model\Validations\User\ValidateContentName;
use Core\ReturnCodes;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Service\API\GetMovies;

class SearchMovies
{
    public function search(Request $req, Response $res): Response
    {
        $form_data = $req->getParsedBody();
        if (empty($form_data)) {
            return new JsonResponse([
                'code' => ReturnCodes::USER_ERROR,
                'message' => 'Usuário não informou o nome do conteúdo'
            ]);
        }

        $content_name = ValidateContentName::validateName($form_data['content_name']);
        if ($content_name === null) {
            return new JsonResponse([
                'code' => ReturnCodes::USER_ERROR,
                'message' => 'Nome do conteúdo inválido'
            ]);
        }

        return new JsonResponse(GetMovies::getMovies(rawurlencode($content_name))); // Transform content name in encoded url and return result to user
    }
}
