<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\customer\PageController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\CheckoutController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Login & Logout
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'handleRegister'])->name('register.post');

// Email Verification
Route::get('/email/verify', [RegisterController::class, 'verification'])
    ->middleware('auth')
    ->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');
Route::post('/email/verification-notification', [RegisterController::class, 'resendVerification'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class)->except(['destroy']);
        Route::put('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
        Route::resource('users', UserController::class)->except(['create', 'store']);
    });

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

<<<<<<< HEAD
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/all-products', [PageController::class, 'allProducts'])->name('all-products');
Route::get('/product-detail/{id}', [PageController::class, 'productDetail'])->name('product-detail');
Route::post('/cart/add/{id}', [PageController::class, 'addToCart'])->name('cart.add');
Route::get('/guide', [PageController::class, 'guide'])->name('guide');


//Route::prefix('customer')->group(function () {
    //Route::get('/home', [PageController::class, 'home'])->name('home');
    //Route::get('/all-products', [PageController::class, 'allProducts'])->name('all-products');
    //Route::get('/cart', [PageController::class, 'cart'])->name('cart');
    //Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
    //Route::get('/guide', [PageController::class, 'guide'])->name('guide');
    //Route::get('/account', [PageController::class, 'account'])->name('account');
    //Route::get('/product-detail', [PageController::class, 'productDetail'])->name('product-detail');
//});
=======
// Halaman utama bisa diakses tanpa login
Route::get('/', [PageController::class, 'home'])->name('customer.home');

// route yang butuh login
// Route::middleware('auth')->group(function () {
//     Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
//     Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//     Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
//     Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
// });
>>>>>>> d356222c334a0e120cc53a7bcafc42ba3e290dc3
