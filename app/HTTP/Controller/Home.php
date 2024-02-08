<?php

namespace App\HTTP\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Service\API\GetHome;

class Home
{
    public function show(Request $req, Response $res): Response
    {
        return new JsonResponse(GetHome::getAll());
    }
}
