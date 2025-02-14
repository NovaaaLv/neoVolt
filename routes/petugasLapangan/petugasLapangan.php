<?php

use App\Http\Controllers\PetugasLapanganController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:petugas_lapangan'])->group(function () {
  Route::get('/petugas-lapangan/daftar-pelanggan', [PetugasLapanganController::class, 'viewDaftarPelanggan'])->name('petugas-lapangan.daftar-pelanggan');

  Route::get('/petugas/daftar-pelanggan', [PetugasLapanganController::class, 'searchPelanggan'])->name('petugas-lapangan.daftar-pelanggan-search');
});
