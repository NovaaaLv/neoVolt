<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Pemakaian;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin/admin.php';
require __DIR__ . '/pelanggan/pelanggan.php';
require __DIR__ . '/petugas/petugas.php';
require __DIR__ . '/petugas/export.php';
require __DIR__ . '/petugasLapangan/petugasLapangan.php';



Route::get('/get-previous-usage/{id}/{tahun}/{bulan}', function ($id, $tahun, $bulan) {
  $bulanSebelumnya = $bulan - 1;
  $tahunSebelumnya = $tahun;

  if ($bulanSebelumnya == 0) {
    $bulanSebelumnya = 12;
    $tahunSebelumnya -= 1;
  }

  $pemakaianSebelumnya = Pemakaian::where('pelanggan_id', $id)
    ->where('tahun', $tahunSebelumnya)
    ->where('bulan', $bulanSebelumnya)
    ->first();

  return response()->json([
    'success' => true,
    'jumlah_pakai' => $pemakaianSebelumnya ? $pemakaianSebelumnya->jumlah_pakai : 0,
  ]);
});
