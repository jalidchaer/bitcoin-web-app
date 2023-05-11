<?php

namespace Tests\Feature;
use App\Models\BitcoinPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BitcoinPriceControllerIntegrationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testIndex()
    {
        $price = BitcoinPrice::factory()->create();

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewIs('index');

        $response->assertSee($price->price);
    }
}
