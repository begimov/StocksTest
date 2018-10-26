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
            return $this->httpClient->request('GET', config('services.api.stocks') . $pathname);

        } catch (RequestException $e) {

            return null;
        }
    }
}
