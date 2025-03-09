<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SalesController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('sales',[
            "products" => $product
        ]);
    }

    public function report(){
        return view('sales_report');
    }
}
