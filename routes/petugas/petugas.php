
<?php

use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:petugas'])->group(function () {
  Route::get('/petugas/dashboard/pembayaran', [PetugasController::class, 'viewPembayaranPelanggan'])->name('petugas.pembayaran');

  Route::get('/petugas/dashboard/pembayaran/${id}/detail', [PetugasController::class, 'viewDetailPembayaran'])->name('petugas.detail-pembayaran');
});
