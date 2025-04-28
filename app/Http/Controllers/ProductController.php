<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return $product;
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
