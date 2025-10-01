<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminDashboardController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');

    /**
     * Product Management
     */
    Route::resource('products', AdminProductController::class);
});
