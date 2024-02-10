<?php

namespace Service\API\Watch;

use Core\ReturnCodes;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GetContentInfo
{
    /**
     * Method to get content data to watch it
     *
     * @param integer $content_id
     * @param integer $season
     * @return array
     */
    public static function getData(int $content_id, int $season = 1): array
    {
        $client = new Client(['verify' => false]);
        try {
            $response = $client->get(env('HOST_API'), [
                'query' => [
                    'page' => 'serie',
                    'id' => $content_id,
                    't' => $season
                ]
            ]);

            if ($response->getStatusCode() != 200) {
                return [
                    'code' => ReturnCodes::INTERNAL_API_ERROR,
                    'message' => 'Erro na API'
                ];
            }

            $body = json_decode($response->getBody());

            return [
                'code' => 200,
                'data' => $body
            ];
        } catch (GuzzleException $e) {
            return [
                'code' => ReturnCodes::USER_ALERT,
                'message' => 'Conteúdo não encontrado'
            ];
        }
    }
}
