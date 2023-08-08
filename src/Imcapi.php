<?php

namespace FredBradley\IMCAPI;

use FredBradley\IMCAPI\Traits\Devices;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Imcapi
{
    use Devices;

    protected PendingRequest $client;

    public function __construct(string $base_uri, string $username, string $password)
    {
        $this->client = Http::baseUrl($base_uri)
            ->withDigestAuth($username, $password)
            ->acceptJson();
    }

    /**
     * @param  array<string, int|string|false>  $query
     */
    public function request(string $method, string $uri, array $query = []): object
    {
        try {
            return $this->client->$method($uri, $query)->throw()->object();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());

            return (object) [
                'error' => $exception->getMessage(),
                'status_code' => $exception->getCode(),
            ];
        }
    }
}
