<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Retailer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /** @test */

    use RefreshDatabase;

    public function it_checks_products_for_retailers()
    {
        // $response = $this->get('/');
        // $response->assertStatus(200);

        $switch = Product::create(['name' => 'Nintendo Switch']);
        
        $bestBuy = Retailer::create(['name' => 'Best Buy']);

        $this->assertFalse($switch->inStock());
        //$bestBuy->haveSttock($swtich);

    }
}