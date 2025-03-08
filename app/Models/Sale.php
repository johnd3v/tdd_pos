<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $fillable = [
        'product_name',
        'shelf_code',
        'renter',
        'price',
        'quantity'
    ];
}
