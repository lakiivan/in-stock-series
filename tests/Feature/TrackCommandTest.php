<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Retailer;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Seeders\RetailerWithProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrackCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tracks_product_stock()
    {
        // Given
        // I have a product with stock
        $this->seed(RetailerWithProductSeeder::class);

        $this->assertFalse(Product::first()->in_stock());

        Http::fake(fn () => ['available' => true, 'price' => 29900]);

        $this->artisan('track')
            ->expectsOutput('All done!');

        $this->assertTrue(Product::first()->in_stock());
    }
}
