<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;

Route::get('/', function (){
    return view('customers.index');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    /**
     * Product Management
     */
    Route::resource('products', ProductController::class);

    /**
     * Category Management
     */
    Route::resource('categories', CategoryController::class)->except(['show']);

    /**
     * Order Management
     */
    Route::resource('orders', OrderController::class)->except(['destroy']);

    /**
     * User Management
     */
    Route::resource('users', UserController::class)->except(['create', 'store']);
});
