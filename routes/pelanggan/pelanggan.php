<?php

use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/pelanggan/check-daftar', [PelangganController::class, 'index'])->name('pelanggan.check-daftar');
Route::get('/pelanggan/check-daftar/search', [PelangganController::class, 'search'])->name('pelanggan.pelanggan.search');
Route::get('/pelanggan/daftar-pelanggan/{id}/pemakaian', [PelangganController::class, 'viewAllDaftarPemakaianPelanggan'])->name('pelanggan.pelanggan.all-pemakaian');
