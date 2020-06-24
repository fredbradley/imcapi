<?php

namespace FredBradley\IMCAPI;

use FredBradley\IMCAPI\Traits\Devices;
use GuzzleHttp\Client;

class Imcapi
{
    use Devices;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Guzzle Constructor
     */
    public function __construct(string $base_uri, string $username, string $password)
    {
        $this->client = new Client([
            'base_uri' => $base_uri,
            'auth' => [$username, $password, 'digest'],
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
    }


    /**
     * @param string $method
     * @param string $uri
     * @param array $json
     * @param array $query
     * @param array $options
     * @param bool $decode
     * @return mixed|string
     */
    public function request(
        string $method,
        string $uri = '',
        array $json = [],
        array $query = [],
        array $options = [],
        bool $decode = true
    ) {
        $response = $this->client->request($method, $uri, array_merge([
            'json' => $json,
            'query' => $query
        ], $options));

        return $decode ? json_decode((string)$response->getBody(), true) : (string)$response->getBody();
    }

}
