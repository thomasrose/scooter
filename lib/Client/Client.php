<?php

namespace Scooter\Client;

use GuzzleHttp\Exception\ClientException;
use Scooter\Search\Model\Query;
use Scooter\Search\Model\Result;

class Client
{
    protected $client;

    public function __construct($host, $port)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => sprintf('http://%s:%s/', $host, $port),
        ]);
    }

    /**
     * @param Query $query
     * @return Result
     */
    public function search(Query $query)
    {
        try {
            $response = $this->client->post(
                '/search/', [
                    'json' => $query,
                ]
            );
        } catch (ClientException $e) {
            // todo: add better error handling here
            throw $e;
        }

        $result = new Result(json_decode($response->getBody(), true));

        return $result;
    }

    public function getApplicationStatus()
    {
        $response = $this->client->get('ApplicationStatus');

        return $response;
    }
}
