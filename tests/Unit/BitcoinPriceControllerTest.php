<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Controllers\BitcoinPriceController;
use App\Models\BitcoinPrice;


class BitcoinPriceControllerTest extends TestCase
{
    use RefreshDatabase;

   public function testIndex()
   {
      $controller = new BitcoinPriceController();
      
      $price1 = BitcoinPrice::factory()->create();
      
      $price2 = BitcoinPrice::factory()->create();
      
      $response = $controller->index();
      
      $viewData = $response->getData()['prices'];
      
      // Realizar afirmaciones
      $this->assertTrue($viewData->contains($price1));
      $this->assertTrue($viewData->contains($price2));
   }

  }
