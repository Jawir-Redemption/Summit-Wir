<?php

use Illuminate\Support\Facades\Route;

// ==================== AUTH ====================
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// ==================== ADMIN ====================
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Customer\PaymentController;

// ==================== CUSTOMER ====================
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;

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

// Forgot Password + Reset
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('products', AdminProductController::class);
        Route::resource('orders', AdminOrderController::class)->except(['destroy', 'edit', 'update']);
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

Route::middleware(['auth', 'verified'])->group(function () {
    // ==================== PROFILE ROUTES ====================
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // ==================== ORDERS ROUTES ====================
    Route::get('/profile/orders/pending', [ProfileController::class, 'pendingOrders'])->name('profile.orders.pending');
    Route::get('/profile/orders/renting', [ProfileController::class, 'rentingOrders'])->name('profile.orders.renting');
    Route::get('/profile/orders/completed', [ProfileController::class, 'completedOrders'])->name(
        'profile.orders.completed',
    );
    Route::get('/profile/orders/cancelled', [ProfileController::class, 'cancelledOrders'])->name(
        'profile.orders.cancelled',
    );
    // ========================================================================

    // ==================== CART ROUTES ====================
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{cart}', [CartController::class, 'deleteFromCart'])->name('cart.delete');

    // ==================== CHECKOUT & PAYMENT ROUTES ====================
    Route::get('/checkout/{order}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::delete('/checkout/cancel/{order}', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
    Route::post('/payment/pay/{order}', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::get('/payment/status/{order}', [PaymentController::class, 'status'])->name('payment.status');
});

Route::post('/payment/notification', [PaymentController::class, 'notificationHandler'])->withoutMiddleware([
    VerifyCsrfToken::class,
]);
