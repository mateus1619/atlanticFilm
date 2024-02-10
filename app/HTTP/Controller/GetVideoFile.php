<?php

namespace App\HTTP\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Service\API\Watch\GetMovieVideoFile;

class GetVideoFile
{
    private array $video_content_type = ['movie', 'serie'];

    public function getFile(Request $req, Response $res, array $args): Response
    {
        for($i = 1; $i <= sizeof($this->video_content_type); $i++) {
            if ($args['type'] != $this->video_content_type[$i - 1]) {
                continue;
            } else {
                $i = sizeof($this->video_content_type) + 1;
            }

            if ($i == 2) {
                return new JsonResponse([
                    'message' => 'Rota não encontrada'
                ], 404);
            }
        }
        $video_file_id = $args['video_id'];

        return new JsonResponse(GetMovieVideoFile::getVideo($video_file_id, $args['type']));
    }
}
