<?php

namespace App\Services\Api;

use GuzzleHttp\Client as HttpClient;

class Client
{
    protected $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get() {

        $response = $this->httpClient->request('GET', config('services.stocks.api'));

        return json_decode($response->getBody()->getContents());
    }
}
