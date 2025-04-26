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
        return $products;
    }

    public function create()
    {
        return view('products.create_product');
    }


    public function store(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $product = ['name' => $name, 'price' => $price];
        return view('products.show', compact('product'));
    }


}
