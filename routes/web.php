<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('arsip.index');
});

Route::resource('kategori', KategoriController::class);

Route::resource('arsip', ArsipController::class);

Route::get('/about', function () {
    return view('about');
});
