<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Models\Category;
use App\Models\Product;
use App\Http\Resources\ProductResource;

// User Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('user/logout', [AuthController::class, 'logout']);
    Route::get('user/profile', [AuthController::class, 'profile']);
});

// User Authentication Routes
Route::post('user/register', [AuthController::class, 'register']);
Route::post('user/login', [AuthController::class, 'login']);

// Admin Authentication Routes
Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// Admin Routes
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
    Route::get('profile', [AdminAuthController::class, 'profile']);
});

// Product and Order Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user/products', [ProductController::class, 'index']);
    Route::get('user/products/{id}', function ($id) {


        try {
            $product = Product::find($id);
            if (!$product) {
                throw new \Exception('المنتج غير موجود');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
        return new ProductResource($product);
    });

    Route::post('user/orders', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);

    // Routes for both users and admins
    // Route::middleware()->group(function () {

    // });
    Route::post('user/products', [ProductController::class, 'store']);
    // Routes for admin only
    Route::middleware('role:admin')->group(function () {
        Route::post('/products', [ProductController::class, 'store']);
        Route::get('/products/{id}', function ($id) {
            $product = Product::find($id);
            abort_if(!$product, 404, 'المنتج غير موجود');   // ← هنا
            return new ProductResource($product);
        });

    });
});

// Test Route for Lazy and Eager Loading
Route::get('/test-lazy-eager-loading', function () {
    DB::enableQueryLog();

    $categories = Category::all();
    foreach ($categories as $category) {
        $category->products;
    }
    $lazyLoadingQueries = DB::getQueryLog();
    DB::flushQueryLog();

    $categoriesWithProducts = Category::with('products')->get();
    $eagerLoadingQueries = DB::getQueryLog();
    DB::flushQueryLog();

    return response()->json([
        'lazy_loading_query_count' => count($lazyLoadingQueries),
        'eager_loading_query_count' => count($eagerLoadingQueries),
    ]);
});
