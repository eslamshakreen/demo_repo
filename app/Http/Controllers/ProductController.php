<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {

        $prods = Product::with('category')->paginate(perPage: 2);
        return ProductResource::collection($prods);
    }

    public function store(Request $r)
    {
        $p = Product::create($r->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]));
        return new ProductResource($p);
    }


}
