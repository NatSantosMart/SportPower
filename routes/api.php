<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\ClientController; 
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\PersonController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CartController; 

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
Route::controller(ProductController::class)->prefix('products')->group(function() {
    Route::get('/', 'index'); 
    Route::post('/', 'store'); 
    Route::post('/{id}', 'update'); 
    Route::put('/{id}', 'put'); 
    Route::get('/{id}', 'show'); 
    Route::delete('/{id}', 'destroy'); 
});
Route::controller(AddedToCartController::class)->prefix('added_to_carts')->group(function() {
    Route::post('/', 'store'); 
    Route::get('/from_client/{dni}', 'indexFromClient'); 
});