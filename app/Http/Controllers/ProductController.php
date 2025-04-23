<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Laptop', 'price' => 1500],
            ['name' => 'Headset', 'price' => 120],
            ['name' => 'Keyboard', 'price' => 75],
        ];
        return view('products.index', compact('products'));
    }
}
