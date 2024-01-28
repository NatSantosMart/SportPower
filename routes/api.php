<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\ClientController; 
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\PersonController; 
use App\Http\Controllers\ProductController; 

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

//http://localhost/api/people
Route::controller(PersonController::class)->prefix('people')->group(function() {
    Route::get('/', 'index'); 
    Route::get('/', 'store'); 
    Route::get('/{id}', 'update'); 
    Route::get('/{id}', 'put'); 
    Route::get('/{id}', 'show'); 
    Route::get('/{id}', 'destroy'); 
});
Route::controller(AdminController::class)->prefix('admins')->group(function() {
    Route::get('/', 'index'); 
    Route::get('/', 'store'); 
    Route::get('/{id}', 'update'); 
    Route::get('/{id}', 'put'); 
    Route::get('/{id}', 'show'); 
    Route::get('/{id}', 'destroy'); 
});
Route::controller(ClientController::class)->prefix('clients')->group(function() {
    Route::get('/', 'index'); 
    Route::get('/', 'store'); 
    Route::get('/{id}', 'update'); 
    Route::get('/{id}', 'put'); 
    Route::get('/{id}', 'show'); 
    Route::get('/{id}', 'destroy'); 
});
Route::controller(CommentController::class)->prefix('comments')->group(function() {
    Route::get('/', 'index'); 
    Route::get('/', 'store'); 
    Route::get('/{id}', 'update'); 
    Route::get('/{id}', 'put'); 
    Route::get('/{id}', 'show'); 
    Route::get('/{id}', 'destroy'); 
});
Route::controller(ProductController::class)->prefix('products')->group(function() {
    Route::get('/', 'index'); 
    // Route::get('/', 'store'); 
    // Route::get('/{id}', 'update'); 
    // Route::get('/{id}', 'put'); 
    Route::get('/{id}', 'show'); 
    // Route::get('/{id}', 'destroy'); 
});