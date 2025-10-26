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

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| All routes for authentication.
|
*/

// Login Route
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');

// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Route
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'handleRegister'])->name('register.post');
Route::get('/email/verify', [RegisterController::class, 'verification'])
    ->middleware('auth')
    ->name('verification.notice');

// Email Verification Route
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');
Route::post('/email/verification-notification', [RegisterController::class, 'resendVerification'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
|
| All routes for admin panel.
|
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        // Product Management
        Route::resource('products', ProductController::class);

        // Order Management
        Route::resource('orders', OrderController::class)->except(['destroy']);

        // User Management
        Route::resource('users', UserController::class)->except(['create', 'store']);
    });

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| All routes for customer side.
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');
