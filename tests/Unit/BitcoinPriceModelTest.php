<?php

namespace Tests\Unit;

use App\Models\BitcoinPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BitcoinPriceModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testGetBitcoinPrices()
    {
        $price = BitcoinPrice::create([
            'price' => 27250,
            'last_updated' => '2023-05-11T13:18:00.000Z',
        ]);

        $data = $price->toArray();

        $this->assertEquals(27250, $data['price']);
        $this->assertEquals('2023-05-11T13:18:00.000Z', $data['last_updated']);
    }
}
