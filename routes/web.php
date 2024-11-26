<?php

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('home',[ProductController::class,'home'])->name('home');
Route::group(['prefix' => 'products'], function() {

    // Products
    Route::get('/category/{id}', [ProductController::class, 'singleCategory'])->name('single.category');
    Route::get('/single-product/{id}', [ProductController::class, 'singleProduct'])->name('single.product');
    Route::get('/shop', [ProductController::class, 'shop'])->name('products.shop');

    // Checkout and Pay
    // Route::post('/prepare-checkout', [ProductController::class, 'prepareCheckout'])->name('products.prepare.checkout');
    // Route::get('/checkout', [ProductController::class, 'checkout'])->name('products.checkout');
    // Route::post('/checkout', [ProductController::class, 'processCheckout'])->name('products.process.checkout');
    // Route::get('/pay', [ProductController::class, 'payWithPaypal'])->name('products.pay');
    // Route::get('/success', [ProductController::class, 'success'])->name('products.success');

    // Carts
    Route::post('/add-cart', [ProductController::class, 'addToCart'])->name('products.add.cart');
    Route::get('/cart', [ProductController::class, 'cart'])->name('products.cart');
    Route::get('/cart/delete/{id}', [ProductController::class, 'deleteFromCart'])->name('products.cart.delete');

});




//checkout and Pay
Route::post('products/prepare-checkout',[ProductController::class,'prepareCheckout'])->name('products.prepare.checkout')
->middleware('check.for.price');

Route::get('products/checkout',[ProductController::class,'checkout'])->name('products.checkout')
->middleware('check.for.price');

Route::post('products/checkout',[ProductController::class,'processCheckout'])->name('products.process.checkout')
->middleware('check.for.price');

Route::get('products/pay',[ProductController::class,'payWithPaypal'])->name('products.pay')
->middleware('check.for.price');

Route::get('products/success',[ProductController::class,'success'])->name('products.success')
->middleware('check.for.price');



//userspages
Route::prefix('users')->group(function () {
    Route::get('/my-orders', [UsersController::class, 'myOrders'])->name('users.orders');
    Route::get('/settings', [UsersController::class, 'settings'])->name('users.settings');
    Route::post('/settings', [UsersController::class, 'updateUserSettings'])->name('users.settings.update');
});


//Regsitration

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//admin

Route::get('/demo', [HomeController::class, 'demo']);


//admin panel


Route::get('admin/login', [AdminController::class, 'viewLogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admin/login', [AdminController::class, 'checkLogin'])->name('check.login');

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){
        Route::get('/index', [AdminController::class, 'index'])->name('admins.dashboard');
        //admins
        Route::get('/all-admins', [AdminController::class, 'displayAdmins'])->name('admin.alladmins');
        Route::get('/create-admins', [AdminController::class, 'createAdmins'])->name('admins.create');
        Route::post('/create-admins', [AdminController::class, 'storeAdmins'])->name('admins.store');
        // category
        Route::get('/all-categories', [AdminController::class, 'displayCategories'])->name('categories.all');
        Route::get('/create-categories', [AdminController::class, 'createCategories'])->name('categories.create');
        Route::post('/create-categories', [AdminController::class, 'storeCategories'])->name('categories.store');
        Route::get('/edit-categories/{id}', [AdminController::class, 'editCategories'])->name('categories.edit');
        Route::post('/update-categories/{id}', [AdminController::class, 'updateCategories'])->name('categories.update');
        Route::get('/delete-categories/{id}', [AdminController::class, 'deleteCategories'])->name('categories.delete');
        //products
        Route::get('/all-products', [AdminController::class, 'displayProducts'])->name('products.all');
        Route::get('/create-products', [AdminController::class, 'createProducts'])->name('products.create');
        Route::post('/create-products', [AdminController::class, 'storeProducts'])->name('products.store');
        Route::get('/delete-products/{id}', [AdminController::class, 'deleteProducts'])->name('products.delete');
        // orders
        Route::get('/all-orders', [AdminController::class, 'displayOrders'])->name('orders.all');
        Route::get('/orders/{id}/edit', [AdminController::class, 'editOrders'])->name('orders.edit');
        Route::post('/orders/{id}/edit', [AdminController::class, 'updateOrders'])->name('orders.edit');

});
Route::post('logout', [AdminController::class, 'logout'])->name('logout');


