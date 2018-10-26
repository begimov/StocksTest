<?php

namespace App\Repositories\Remote\Stocks;

use App\Services\Api\Client;
use App\Repositories\Remote\RemoteRepositoryAbstract;
use App\Repositories\Contracts\Stocks\StockRepository;

class RemoteStockRepository extends RemoteRepositoryAbstract implements StockRepository
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get()
    {
        $response = $this->client->get(
            'stocks.json'
        );

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;
        
    }
}
