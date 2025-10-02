<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kita daftarkan semua route untuk aplikasi web.
| Route default diarahkan ke halaman login.
|
*/

// Default route -> ke login.blade.php
Route::get('/', function () {
    return view('login'); // resources/views/login.blade.php
})->name('login');

// Route register -> ke register.blade.php
Route::get('/register', function () {
    return view('register'); // resources/views/register.blade.php
})->name('register');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Semua route dengan prefix "admin" hanya untuk bagian admin.
|
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Product Management
    Route::resource('products', ProductController::class);

    // Category Management
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Order Management
    Route::resource('orders', OrderController::class)->except(['destroy']);

    // User Management
    Route::resource('users', UserController::class)->except(['create', 'store']);
});
