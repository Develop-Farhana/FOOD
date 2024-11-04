<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Products\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Users\UsersController;
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



//
Route::get('products/category/{id}',[ProductController::class,'singleCategory'])->name('single.category');

Route::get('products/single-product/{id}',[ProductController::class,'singleProduct'])->name('single.product');

Route::get('products/single-product/{id}',[ProductController::class,'singleProduct'])->name('single.product');

Route::get('products/shop',[ProductController::class,'shop'])->name('products.shop');

//carts
Route::post('products/add-cart',[ProductController::class,'addToCart'])->name('products.add.cart');
Route::get('products/cart',[ProductController::class,'cart'])->name('products.cart');
Route::get('/cart/delete/{id}', [ProductController::class, 'deleteFromCart'])->name('products.cart.delete');

//checkout and Pay
// Route::post('products/prepare-checkout',[ProductController::class,'preapareCheckout'])->name('products.prepare.chekout');
// Route::get('products/checkout',[ProductController::class,'checkout'])->name('products.chekout')
// ->middleware('check.for.price');
// Route::post('products/checkout',[ProductController::class,'processCheckout'])->name('products.process.chekout')
// ->middleware('check.for.price');
// Route::get('products/pay',[ProductController::class,'payWithPaypal'])->name('products.pay')
// ->middleware('check.for.price');
// Route::get('products/successs',[ProductController::class,'success'])->name('products.success')
// ->middleware('check.for.price');

Route::post('products/prepare-checkout',[ProductController::class,'preapareCheckout'])->name('products.prepare.chekout');
Route::get('products/checkout',[ProductController::class,'checkout'])->name('products.chekout');
Route::post('products/checkout',[ProductController::class,'processCheckout'])->name('products.process.chekout');
Route::get('products/pay',[ProductController::class,'payWithPaypal'])->name('products.pay');
Route::get('products/success',[ProductController::class,'success'])->name('products.success');


//userspages
Route::get('users/my-orders',[UsersController::class,'myOrders'])->name('users.orders');
Route::get('users/settings',[UsersController::class,'settings'])->name('users.settings');
Route::post('users/settings/{id}',[UsersController::class,'updateUserSettings'])->name('users.settings.update');


//Regsitration

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/home', function () {
    return view('home');
})->middleware('auth');

