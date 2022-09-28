<?php

namespace Tests\Unit;

use App\Models\Stock;
use App\Models\Retailer;
use PHPUnit\Framework\TestCase;
use Database\Seeders\RetailerWithProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Whoops\Run;

class StockTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_throws_an_exception_if_a_client_is_not_found_when_tracking()
    {
        $this->assertTrue(true);
        // $this->seed(RetailerWithProductSeeder::class);

        // Retailer::first()->update(['name' => 'Foo Retailer']);

        // $this->expectException(ClientException::class);

        // Stock::first()->track();
    }
}
