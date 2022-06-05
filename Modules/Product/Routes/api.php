<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;

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

// Route::middleware('auth:api')->get('/product', function (Request $request) {
//     return $request->user();
// });
Route::get('produk/all', [ProductController::class, 'index']);
Route::post('produk/add', [ProductController::class, 'store']);
Route::get('produk/{id}', [ProductController::class, 'show']);
Route::post('produk/update/{id}', [ProductController::class, 'update']);
Route::delete('produk/delete/{id}', [ProductController::class, 'destroy']);
