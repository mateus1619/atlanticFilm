<?php

namespace Service\API\Watch;

use Core\ReturnCodes;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Service\Util\GenerateBase64ToGetMovieFile;

class GetMovieVideoFile
{
    public static function getVideo(int $video_id, string $video_content_type): array
    {
        $base64_hash = GenerateBase64ToGetMovieFile::generateHash($video_id, $video_content_type);
        
        $client = new Client(['verify' => false]);
        try {
            $response = $client->post(env('HOST_API'), [
                'form_params' => [
                    'data' => $base64_hash
                ]
            ]);
           $body = json_decode($response->getBody());

           if (empty($body)) {
            return [
                'code' => ReturnCodes::USER_ALERT,
                'message' => 'Vídeo não encontrado'
            ];
           }

            return [
                'code' => 200,
                'data' => $body
            ];

        } catch (GuzzleException $e) {
            return [
                'code' => ReturnCodes::USER_ALERT,
                'message' => 'Vídeo não encontrado'
            ];
        }
    }
}
