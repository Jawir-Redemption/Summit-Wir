<?php

use Illuminate\Support\Facades\Route;

// ==================== AUTH ====================
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

// ==================== ADMIN ====================
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\PageController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\customer\PaymentController;
use App\Http\Controllers\customer\ProfileController;

// ==================== CUSTOMER ====================
use App\Http\Controllers\customer\CheckoutController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\customer\ProductController as CustomerProductController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'handleRegister')->name('register.post');
    Route::get('/email/verify', 'verification')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')
        ->middleware(['auth', 'signed'])
        ->name('verification.verify');
    Route::post('/email/verification-notification', 'resendVerification')
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified', 'is_admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('products', AdminProductController::class);
        Route::resource('orders', AdminOrderController::class)->except(['destroy']);
        Route::put('orders/{order}/status', [AdminOrderController::class, 'update'])->name('orders.update');
        Route::resource('users', AdminUserController::class)->except(['create', 'store']);
        Route::resource('categories', AdminCategoryController::class)->except(['show']);
    });

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/guide', [PageController::class, 'guide'])->name('guide');

Route::get('/products', [CustomerProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [CustomerProductController::class, 'show'])->name('product.detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{cart}', [CartController::class, 'deleteFromCart'])->name('cart.delete');

    Route::get('/checkout/{order}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::delete('/checkout/cancel/{order}', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
    Route::post('/payment/pay/{order}', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::get('/payment/status/{order}', [PaymentController::class, 'status'])->name('payment.status');
});

Route::post('/payment/notification', [PaymentController::class, 'notificationHandler'])->withoutMiddleware([
    VerifyCsrfToken::class,
]);
