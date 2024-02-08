<?php

namespace Service\API;

use Core\ReturnCodes;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GetMovies
{
    /**
     * Method to search Movie
     *
     * @param string $movie_name
     * @return array
     */
    public static function getMovies(string $movie_name): array
    {
        $client = new Client(['verify' => false]);

        try {
            $response = $client->get(env('HOST_API'), [
                'query' => [
                    'action' => 'search',
                    'q' => $movie_name,
                    't' => 'filmes'
                ]
            ]);
            if ($response->getStatusCode() != 200) {
                return [
                    'code' => ReturnCodes::INTERNAL_API_ERROR,
                    'message' => 'Erro na API'
                ];
            }

            $body = json_decode($response->getBody());
            if (empty($body)) {
                return [
                    'code' => ReturnCodes::USER_ALERT,
                    'message' => 'Filme não encontrado'
                ];
            }

            return [
                'code' => 200,
                'data' => $body->list
            ];
        } catch (GuzzleException $e) {
            return [
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }
    }
}
