<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'name',
        'type',
        'shelf_code',
        'renter',
        'image',
        'price'
    ];
}
