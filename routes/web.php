<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
Route::get('/umkm/{slug}', [UmkmController::class, 'show'])->name('umkm.show');

Route::get('/wisata', [TourismController::class, 'index'])->name('wisata.index');
Route::get('/wisata/{slug}', [TourismController::class, 'show'])->name('wisata.show');

Route::get('/peta', [MapController::class, 'index'])->name('peta');
Route::get('/api/locations', [MapController::class, 'locations'])->name('api.locations');
