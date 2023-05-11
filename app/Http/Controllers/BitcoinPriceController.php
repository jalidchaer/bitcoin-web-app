<?php

namespace App\Http\Controllers;

use App\Models\BitcoinPrice;
use Illuminate\Http\Request;

class BitcoinPriceController extends Controller
{
    public function index()
    {
        $prices = BitcoinPrice::all();

        return view('index', compact('prices'));
    }
}