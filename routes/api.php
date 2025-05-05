<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');

Route::get('/products', function (Request $request) {
    return Product::all();
});

Route::get('/product/{id}', function (Request $request, $id) {
    $product = Product::findOrFail($id);
    return $product;
})->name('product_detils');

Route::get('/product-category/{id}', function (Request $request, $id) {
    $product = Product::findOrFail($id)->category;
    return $product;
})->name('product_category');


Route::get('/category-products/{id}', function (Request $request, $id) {
    $product = Category::findOrFail($id)->products;
    return $product;
})->name('product_category')->middleware('age:21');


// Route::post('/product', function (Request $request) {
//     $product = Product::create($request->all())
//     return $product;
// })->name('product_create');


Route::post('/product', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()->first()], 422);
    }
    $product = Product::create($request->all());
    return $product;

});

// Route::post('/product', function (Request $request) {


//     $product = Product::create($request->all());
//     return $product;
// })->name('product_create'); 

Route::get('/club', fn() => 'أهلاً بك في النادي')->middleware('age');

