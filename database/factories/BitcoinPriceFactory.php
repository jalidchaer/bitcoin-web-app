<?php

namespace Database\Factories;

use App\Models\BitcoinPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class BitcoinPriceFactory extends Factory
{
    protected $model = BitcoinPrice::class;

    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween(10000, 30000),
            'last_updated' => '2023-05-11T13:18:00.000Z',
        ];
    }
}
