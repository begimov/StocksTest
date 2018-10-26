<?php

namespace App\Http\Controllers\Stocks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        dd($this->stocks->get());
    }
}
