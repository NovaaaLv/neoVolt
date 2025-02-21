<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::get('/admin/dashboard', [DashboardController::class, 'viewDashboard'])->name('admin.dashboard');

  // Tambah Petugas
  Route::get('/admin/dashboard/daftar-petugas', [DashboardController::class, 'daftarPetugas'])->name('admin.dashboard-daftar-petugas');
  Route::get('/admin/dashboard/add-petugas', [DashboardController::class, 'viewAddPetugas'])->name('admin.dashboard-add-petugas');
  Route::post('/admin/dashboard/add-petugas', [AdminController::class, 'addPetugas'])->name('add-petugas');
  Route::get('/admin/dashboard/daftar-petugas/{id}/edit', [AdminController::class, 'editPetugas'])->name('admin.edit-petugas');
  Route::put('/admin/dashboard/daftar-petugas/{id}/update', [AdminController::class, 'updatePetugas'])->name('admin.update-petugas');
  Route::delete('/admin/dashboard/daftar-petugas/{id}/delete', [AdminController::class, 'deletePetugas'])->name('admin.delete-petugas');

  // Tarif
  Route::get('/admin/dashboard/daftar-tarif', [DashboardController::class, 'viewTarif'])->name('admin.dashboard-daftar-tarif');
  Route::get('/admin/dashboard/add-tarif', [DashboardController::class, 'viewAddTarif'])->name('admin.dashboard-add-tarif');
  Route::post('/admin/dashboard/add-tarif', [AdminController::class, 'AddTarif'])->name('admin.add-tarif');

  Route::get('/admin/dashboard/{id}/edit-tarif', [AdminController::class, 'EditTarif'])->name('admin.edit-tarif');
  Route::put('/admin/dashboard/{id}/update-tarif', [AdminController::class, 'UpdateTarif'])->name('admin.update-tarif');
  Route::delete('/admin/dashboard/daftar-tarif/{id}/delete', [AdminController::class, 'deleteTarif'])->name('admin.delete-tarif');
});
