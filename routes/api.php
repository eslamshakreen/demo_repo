<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/products', function (Request $request) {
    return Product::all();
});

Route::get('/product/{id}', function (Request $request, $id) {
    $product = Product::findOrFail($id);
    return $product;
})->name('product_detils');