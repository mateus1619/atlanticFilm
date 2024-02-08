<?php

namespace Service\API;

use Core\ReturnCodes;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GetHome
{
    /**
     * Method to get home of Film API
     *
     * @return array
     */
    public static function getAll(): array
    {
        $client = new Client(['verify' => false]);
        $body = null;

        try {
            $response = $client->get(env('HOST_API'), ['query' => ['page' => 'home']]);
            if ($response->getStatusCode() != 200) {
                return [
                    'code' => ReturnCodes::INTERNAL_API_ERROR,
                    'message' => 'Erro na API'
                ];    
            }
            $body = json_decode($response->getBody());
        } catch (GuzzleException $e) {
            return [
                'code' => ReturnCodes::INTERNAL_ERROR,
                'message' => 'Não foi possível fazer a requisição'
            ];
        }

        return self::dataProcessing($body);
    }

    /**
     * Method to processing data
     *
     * @param object $body
     * @return array
     */
    private static function dataProcessing(object $body): array
    {
        return [
            'code' => 200,
            'data' => [
                'top_10' => [
                'id' => 1010,
                'title' => 'Mais vistos',
                'list' => $body->posts->top_10->list
                ],
                'trend' => [
                    'id' => 1011,
                    'title' => 'Em alta',
                    'list' => $body->posts->em_alta->list
                ],
                'releases' => [
                    'id' => 1012,
                    'title' => 'Lançamentos',
                    'list' => $body->posts->lancamentos->list
                ],
                'series' => [
                    'id' => 1013,
                    'title' => 'Séries',
                    'list' => $body->posts->series->list
                ],
                'movies' => [
                    'id' => 1014,
                    'title' => 'Filmes',
                    'list' => $body->posts->filmes->list
                ],
                'animes' => [
                    'id' => 1015,
                    'title' => 'Animes',
                    'list' => $body->posts->animes->list
                ],
                'highlighted' => [
                    'id' => 1016,
                    'title' => 'Destacados',
                    'list' => $body->destacados
                ]
            ]
        ];
    }
}
