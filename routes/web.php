<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',[HomeController::class,'home']);
Route::get('shop',[HomeController::class,'shop'])->name('shop');
Route::get('product-detail',[HomeController::class,'product'])->name('product');
Route::get('cart',[HomeController::class,'cart'])->name('cart');

Route::get('checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('trans',action: [HomeController::class,'transaction'])->name('trans');

Route::get(uri: 'register',action: [HomeController::class,'registeration'])->name('register');
Route::get(uri: 'login',action: [HomeController::class,'login'])->name('login');
