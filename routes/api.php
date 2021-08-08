<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Show all products
Route::get('products', [ProductsController::class, 'showProducts']);
// Get product by id
Route::get('product/{id}', [ProductsController::class, 'getProductById']);
// Create product
Route::post('newProduct', [ProductsController::class, 'createProduct']);
// Delete product
Route::delete('deleteProduct/{id}', [ProductsController::class, 'deleteProduct']);
// Update product
Route::put('updateProduct/{id}', [ProductsController::class, 'updateProduct']);

// Show product category
Route::get('productCategory/{id}', [ProductsController::class, 'showCategory']);

// Show all products with his category
Route::get('categories', [CategoryController::class, 'index']);