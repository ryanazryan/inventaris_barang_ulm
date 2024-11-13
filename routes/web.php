<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PengirimanBarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('pengiriman_barang', PengirimanBarangController::class)->middleware('auth');

Route::get('/lantai/byGedung', [RegisteredUserController::class, 'getLantaiByGedung'])->name('lantai.byGedung');
Route::get('/ruangan/byLantai', [RegisteredUserController::class, 'getRuanganByLantai'])->name('ruangan.byLantai');




require __DIR__.'/auth.php';
