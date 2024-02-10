<?php

namespace App\HTTP\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Service\API\Watch\GetContentInfo;

class MovieInfo
{
    public function getInfo(Request $req, Response $res, array $args): Response
    {
        $movie_id = $args['id'];
        $season = key_exists('season', $args) ? $args['season'] : 1;

        $get_content_info = GetContentInfo::getData($movie_id, $season);
        return new JsonResponse($get_content_info);
    }
}
