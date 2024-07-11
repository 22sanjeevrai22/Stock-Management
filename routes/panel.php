<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('dashboard', function () {
    return redirect()->route('admin.dashboard');
});

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('dashboard', function () {
        return view('panel.dashboard');
    })->name('admin.dashboard');

    Route::get('product', [ProductController::class, 'index'])->name('product.index');
});
