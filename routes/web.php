<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home.index')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('portal', 'pages.dashboard.index')->name('dashboard');
});

require __DIR__.'/settings.php';
