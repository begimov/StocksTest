<?php

namespace App\Services\Api;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

class Client
{
    protected $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get($pathname) {

        try {
            $response = $this->httpClient->request('GET', config('services.api.stocks') . $pathname);

            return $response;

        } catch (RequestException $e) {
            //
        }
    }
}
