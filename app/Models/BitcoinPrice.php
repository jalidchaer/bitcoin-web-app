<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitcoinPrice extends Model
{
    use HasFactory;

    protected $table = 'bitcoin_prices';

    protected $fillable = [
        'price',
        'last_updated',
    ];
}
