<?php

namespace App\Models;

use App\Clients\Target;
use App\Clients\BestBuy;
use Illuminate\Support\Str;
use Facades\App\Clients\ClientFactory;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $casts = [
        'in_stock' => 'boolean'
    ];


    public function track()
    {
        $status = $this->retailer
            ->client()
            ->checkAvailability($this);

        $this->update([
            'in_stock' => $status->available,
            'price' => $status->price
        ]);
    }

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }
}
