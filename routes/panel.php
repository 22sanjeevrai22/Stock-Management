<?php

use Illuminate\Support\Facades\Route;

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
});
