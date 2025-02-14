<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function viewDashboard()
  {
    return view('dashboard.admin.dashboard');
  }
  public function viewAddPetugas()
  {
    return view('dashboard.admin.tambah-petugas');
  }
}
