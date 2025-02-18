<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tarif;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function viewDashboard()
  {
    $petugasCount = User::where('role', 'petugas')->count();
    $petugasLapanganCount = User::where('role', 'petugas_lapangan')->count();
    $pelangganCount = Pelanggan::count();
    return view('dashboard.admin.dashboard', compact(['petugasCount', 'petugasLapanganCount', 'pelangganCount']));
  }
  public function viewAddPetugas()
  {
    return view('dashboard.admin.tambah-petugas');
  }
  public function viewAddTarif()
  {
    return view('dashboard.admin.tambah-tarif');
  }
  public function daftarPetugas()
  {
    $petugas = User::whereIn('role', ['petugas', 'petugas_lapangan'])->paginate(10);
    return view('dashboard.admin.daftar-petugas', compact('petugas'));
  }

  public function viewTarif()
  {
    $tarif = Tarif::all();
    return view('dashboard.admin.daftar-tarif', compact('tarif'));
  }
}
