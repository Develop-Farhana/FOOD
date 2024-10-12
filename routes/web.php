<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Products\ProductController;
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

// Route::get('product-detail',[HomeController::class,'product'])->name('product');
Route::get('cart',[HomeController::class,'cart'])->name('cart');

Route::get('checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('trans',action: [HomeController::class,'transaction'])->name('trans');

Route::get(uri: 'register',action: [HomeController::class,'registeration'])->name('register');
Route::get(uri: 'login',action: [HomeController::class,'login'])->name('login');

//
Route::get('products/category/{id}',[ProductController::class,'singleCategory'])->name('single.category');

Route::get('products/single-product/{id}',[ProductController::class,'singleProduct'])->name('single.product');

Route::get('products/single-product/{id}',[ProductController::class,'singleProduct'])->name('single.product');

Route::get('products/shop',[ProductController::class,'shop'])->name('products.shop');

//carts
Route::post('products/add-cart',[ProductController::class,'addToCart'])->name('products.add.cart');
Route::get('products/cart',[ProductController::class,'cart'])->name('products.cart');

