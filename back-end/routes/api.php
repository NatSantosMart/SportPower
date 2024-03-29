<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\ClientController; 
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\PostController; 
use App\Http\Controllers\RatingController; 
use App\Http\Controllers\PersonController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\ClothingController; 
use App\Http\Controllers\SupplementController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\FavoriteController; 
use App\Http\Controllers\OrderController; 
use App\Http\Controllers\OrderProductController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AdminController::class)->prefix('admins')->group(function() {
    Route::get('/', 'index'); 
    Route::post('/', 'store'); 
    Route::post('/{id}', 'update'); 
    Route::put('/{id}', 'put'); 
    Route::get('/{id}', 'show'); 
    Route::delete('/{id}', 'destroy');  
});
Route::controller(ClientController::class)->prefix('clients')->group(function() {
    Route::get('/', 'index'); 
    Route::post('/', 'store'); 
    Route::post('/{dni}', 'update'); 
    Route::put('/{dni}', 'put'); 
    Route::get('/{dni}', 'show'); 
    Route::delete('/{dni}', 'destroy'); 
});
Route::controller(CommentController::class)->prefix('comments')->group(function() {
    Route::get('/', 'index'); 
    Route::post('/', 'store'); 
    Route::post('/{id}', 'update'); 
    Route::put('/{id}', 'put'); 
    Route::get('/{id}', 'show'); 
    Route::delete('/{id}', 'destroy'); 
});
Route::controller(PostController::class)->prefix('posts')->group(function() {
    Route::get('/', 'index'); 
    Route::post('/', 'store'); 
    Route::put('/{comment_id}', 'put'); 
    Route::get('/{comment_id}', 'show'); 
    Route::delete('/{comment_id}', 'destroy'); 
});
Route::controller(RatingController::class)->prefix('ratings')->group(function() {
    Route::get('/from_product/{product_id}', 'indexFromProduct'); 
    Route::post('/', 'store'); 
    Route::put('/{comment_id}', 'put'); 
    Route::get('/{comment_id}', 'show'); 
    Route::delete('/{comment_id}', 'destroy'); 
});
Route::controller(ProductController::class)->prefix('products')->group(function() {
    Route::get('/', 'index'); 
    Route::post('/', 'store'); 
    Route::post('/{id}', 'update'); 
    Route::put('/{id}', 'put'); 
    Route::get('/{id}', 'show'); 
    Route::delete('/{id}', 'destroy'); 
});
Route::controller(ClothingController::class)->prefix('clothes')->group(function() {
    Route::get('/', 'index'); 
    Route::post('/', 'store'); 
    Route::post('/{product_id}', 'update'); 
    Route::put('/{product_id}', 'put'); 
    Route::get('/{product_id}', 'show'); 
    Route::delete('/{product_id}', 'destroy'); 
});
Route::controller(SupplementController::class)->prefix('supplements')->group(function() {
    Route::get('/', 'index'); 
    Route::post('/', 'store'); 
    Route::post('/{product_id}', 'update'); 
    Route::put('/{product_id}', 'put'); 
    Route::get('/{product_id}', 'show'); 
    Route::delete('/{product_id}', 'destroy'); 
});
Route::controller(CartController::class)->prefix('carts')->group(function() {
    Route::post('/', 'store'); 
    Route::put('/{id}', 'put'); 
    Route::delete('/{id}', 'destroy');
    Route::get('/from_client/{dni}', 'indexFromClient'); 
});
Route::controller(FavoriteController::class)->prefix('favorites')->group(function() {
    Route::post('/', 'store'); 
    Route::delete('/{id}', 'destroy');
    Route::get('/from_client/{dni}', 'indexFromClient'); 
});
Route::controller(OrderController::class)->prefix('orders')->group(function() {
    Route::get('/', 'index'); 
    Route::post('/', 'store'); 
    Route::get('/{id}', 'show'); 
    Route::delete('/{id}', 'destroy'); 
    Route::get('/from_client/{dni}', 'indexFromClient'); 
});
Route::controller(OrderProductController::class)->prefix('order_products')->group(function() {
    Route::get('/from_order/{id}', 'indexFromOrder'); 
    Route::post('/', 'store'); 
});