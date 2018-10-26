<?php

namespace App\Http\Controllers\Stocks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Contracts\Stocks\StockRepository;

class StockController extends Controller
{
    protected $stocks;

    public function __construct(StockRepository $stocks)
    {
        $this->stocks = $stocks;
    }
    public function index()
    {
        if (Cache::has('stocks')) {

            return Cache::get('stocks');
        }
        
        Cache::put('stocks', $stocks = $this->stocks->get(), 60);

        return $stocks;
    }
}
