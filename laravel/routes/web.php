<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ProductController::class, 'list']);

Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'detail']);

Route::get('/cart/{id}', [\App\Http\Controllers\ProductController::class, 'addToCart']);

Route::get('/cart', [\App\Http\Controllers\ProductController::class, 'openCart']);

Route::get('/login', [\App\Http\Controllers\ProductController::class, 'login']);

Route::post('/loginUser', [\App\Http\Controllers\LoginController::class, 'login']);

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'openRegisterView']);

Route::post('/registerUser', [\App\Http\Controllers\RegisterController::class, 'register']);
