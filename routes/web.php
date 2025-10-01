<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CategoryController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');

    /**
     * Product Management
     */
    Route::resource('products', AdminProductController::class);

    /**
     * Category Management
     */
    Route::resource('categories', CategoryController::class)->except(['show']);
});
