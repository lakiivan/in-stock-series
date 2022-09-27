<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $casts = [
    'in_stock' => 'boolean'
    ];


    public function track()
    {
        // Hit an API endpoint for the associated reatailer
        if ($this->retailer->name === 'Best Buy') {
            //dd($results);

            // Fetch the up-to-date details for he item
            $results = Http::get('http://foo.test')->json();

            // And then refresh the curretn sotck record
            $this->update([
                'in_stock' => $results['available'],
                'price' => $results['price']
            ]);
        }
    }

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }
}
