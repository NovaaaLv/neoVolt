<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasLapanganController extends Controller
{
  public function viewDaftarPelanggan()
  {
    return view('dashboard.petugas_lapangan.daftar-pelanggan');
  }
}
