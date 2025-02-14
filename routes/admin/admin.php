<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::get('/admin/dashboard', [DashboardController::class, 'viewDashboard'])->name('admin.dashboard');
  Route::get('/admin/dashboard/add-petugas', [DashboardController::class, 'viewAddPetugas'])->name('admin.dashboard-add-petugas');
});
