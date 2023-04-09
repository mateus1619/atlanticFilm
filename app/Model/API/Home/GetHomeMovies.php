<?php

namespace App\Model\API\Home;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GetHomeMovies
{
    /**
     * Method to get home of Film API
     *
     * @return array
     */
    public function getAll(): array
    {
        $url = STREAMING_API;

        $client = new Client([
            'verify' => false
        ]);
        $body = null;

        try {
            $response = $client->get($url, [
                'query' => ['page' => 'home']
            ]);
            if ($response->getStatusCode() != 200) {
                return [
                    'code' => 500,
                    'message' => 'Erro na API'
                ];    
            }
            $body = json_decode($response->getBody());
        } catch (GuzzleException $e) {
            return [
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }

        $body = json_decode($response->getBody());
        return $this->dataProcessing($body);
    }

    /**
     * Method to processing data
     *
     * @param object $body
     * @return array
     */
    private function dataProcessing(object $body): array
    {
        return [
            'code' => 200,
            'top_10' => [
                'id' => 1010,
                'title' => 'Mais vistos',
                'list' => $body->posts->top_10->list
            ],
            'in_high' => [
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
        ];
    }
}
