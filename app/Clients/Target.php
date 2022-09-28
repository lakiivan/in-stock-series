<?php

namespace App\Clients;

use App\Models\Stock;
use App\Clients\Client;
use App\Clients\StockStatus;

class Target implements Client
{
    public function checkAvailability(Stock $stock): StockStatus
    {
        return new StockStatus(true, 12000);
    }
}
