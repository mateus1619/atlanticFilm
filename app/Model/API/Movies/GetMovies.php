<?php

namespace App\Model\API\Movies;

use App\Model\API\RequestType;
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
    public function getMovies(string $movie_name): array
    {
        $client = new Client([
            'verify' => false
        ]);

        try {
            $response = $client->get(RequestType::returnURLParsed($movie_name, 'filmes'));
            if ($response->getStatusCode() != 200) {
                return [
                    'code' => 500,
                    'message' => 'Erro na API'
                ];
            }

            $body = json_decode($response->getBody());
            if (empty($body)) {
                return [
                    'code' => 400,
                    'message' => 'Filmes não encontrado'
                ];
            }

            return [
                'code' => 200,
                'list' => $body->list
            ];
        } catch (GuzzleException $e) {
            return [
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }
    }
}
