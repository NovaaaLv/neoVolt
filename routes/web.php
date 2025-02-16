<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
require __DIR__ . '/petugasLapangan/petugasLapangan.php';
