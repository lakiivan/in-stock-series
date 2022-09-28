<?php

namespace App\Clients;

use App\Clients\StockStatus;
use App\Models\Stock;

interface Client
{
    public function checkAvailability(Stock $stock): StockStatus;
}
