<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Retailer;
use Database\Seeders\RetailerWtihProduct;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrackCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tracks_product_stock()
    {
        // Given
        // I have a product with stock
        $this->seed(RetailerWtihProductSeeder::class);

        // Http::fake(function () {
        //     return [
        //         'available' => 'true',
        //         'price' => 29000
        //     ];
        // });
        Http::fake(fn () => ['available' => true, 'price' => 29900]);

        // When
        // I trigger the php artisan track command
        // And assuming the stock is available now
        $this->artisan('track');


        // Then
        // The stock details should be refreshed
        $this->assertTrue($stock->fresh()->in_stock);
    }
}
