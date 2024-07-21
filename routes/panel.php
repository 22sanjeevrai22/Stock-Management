<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\VariationOptionController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;


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
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');

    Route::get('category', [CategoryController::class, 'index'])->name('category.index');

    Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('variation', [VariationController::class, 'index'])->name('variation.index');
    Route::get('variation-option', [VariationOptionController::class, 'index'])->name('variation-option.index');
    Route::get('item', [ItemController::class, 'index'])->name('item.index');

});
