<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PetugasLapanganController extends Controller
{
  public function viewDaftarPelanggan()
  {
    return view('dashboard.petugas_lapangan.daftar-pelanggan');
  }

  public function searchPelanggan(Request $request)
  {
    $search = $request->input('search');

    if (!$search) {
      return redirect()->route('petugas-lapangan.daftar-pelanggan')->with('error', 'Tolong masukkan No Kontrol sebelum melakukan pencarian.');
    }

    $pelanggan = Pelanggan::where('no_kontrol', 'like', "%{$search}%")
      ->orWhere('nama', 'like', "%{$search}%")
      ->get();


    return view('dashboard.petugas_lapangan.daftar-pelanggan', compact('pelanggan', 'search'));
  }
}
