<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/products', [ProductController::class, 'index'])->name('products');

// Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');

// Route::get('/create-product', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');



Route::get('/products', [ProductController::class, 'index'])->name('products');

// Route::get('/products', function () {
//     $products = Product::all();
//     return view('products.index', compact('products'));
// })->name('products');

// Route::get('/product/{id}', [ProductController::class, 'show'])->name('product_detils');


Route::get('/product/{id}', function ($id) {
    $product = Product::findOrFail($id);
    return $product;
})->name('product_detils');