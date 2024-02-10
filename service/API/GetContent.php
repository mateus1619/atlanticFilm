<?php

namespace Service\API;

use Core\ReturnCodes;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Service\Enum\ContentType;

class GetContent
{
    /**
     * Method to search for some content
     *
     * @param string $content_name
     * @param ContentType $content_type
     * @return array
     */
    public static function search(string $content_name, ContentType $content_type): array
    {
        $client = new Client(['verify' => false]);

        try {
            $response = $client->get(env('HOST_API'), [
                'query' => [
                    'action' => 'search',
                    'q' => $content_name,
                    't' => $content_type->value
                ]
            ]);

            $body = json_decode($response->getBody());
            if (empty($body)) {
                return [
                    'code' => ReturnCodes::USER_ALERT,
                    'message' => 'Conteúdo não encontrado'
                ];
            }

            return [
                'code' => 200,
                'data' => $body->list
            ];
        } catch (GuzzleException $e) {
            return [
                'code' => ReturnCodes::INTERNAL_API_ERROR,
                'message' => 'Erro na API'
            ];
        }
    }
}
