<?php

use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/pelanggan/check-daftar', [PelangganController::class, 'index'])->name('pelanggan.check-daftar');
Route::get('/pelanggan/check-daftar/search', [PelangganController::class, 'search'])->name('pelanggan.pelanggan.search');
