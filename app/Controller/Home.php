<?php

namespace App\Controller;

use App\Model\API\Home\GetHomeMovies;
use App\Views\View;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Home
{
    public function show(Request $req, Response $res): Response
    {
        $data = (new GetHomeMovies())->getAll();

        // end
        try {
            return new JsonResponse($data);
        } catch (LoaderError | RuntimeError | SyntaxError $error) {
            return new JsonResponse(['message' => 'Não foi possível renderizar a view'], 502);
        }

        return $res;
    }
}
