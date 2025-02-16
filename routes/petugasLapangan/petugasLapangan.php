<?php

use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PetugasLapanganController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:petugas_lapangan'])->group(function () {
  Route::get('/petugas-lapangan/daftar-pelanggan', [PetugasLapanganController::class, 'viewDaftarPelanggan'])->name('petugas-lapangan.daftar-pelanggan');

  Route::get('/petugas/daftar-pelanggan', [PetugasLapanganController::class, 'searchPelanggan'])->name('petugas-lapangan.daftar-pelanggan-search');

  Route::get('/petugas/daftar-pelanggan/{id}/detail', [PetugasLapanganController::class, 'detailDaftarPelanggan'])->name('petugas-lapangan.daftar-pelanggan.detail');
  // update step-1
  Route::put('/petugas/daftar-pelanggan/{id}/detail/update', [PetugasLapanganController::class, 'updateProfile'])->name('petugas-lapangan.daftar-pelanggan.detail.update-profile');
  // post step-2
  Route::post('/petugas/daftar-pelanggan/{id}/detail/update-2', [PetugasLapanganController::class, 'updatePemakaian'])->name('petugas-lapangan.daftar-pelanggan.detail.tambah-pemakaian');

  Route::get('/petugas/daftar-pelanggan/{id}/detail/success', [PetugasLapanganController::class, 'addPemakaianSuccess'])->name('petugas-lapangan.tambah-pemakaian.success');
});
