
<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:petugas'])->group(function () {
  Route::get('pemakaian/export-pdf/{id}', [PDFController::class, 'exportPemakaian'])->name('petugas.export-pemakaian');
});
