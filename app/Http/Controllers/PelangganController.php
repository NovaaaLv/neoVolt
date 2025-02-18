<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
  public function index()
  {
    $search = null;
    $pelanggan = Pelanggan::get()->all();
    return view('dashboard.pelanggan.pelanggan', compact(['pelanggan', 'search']));
  }
  public function search(Request $request)
  {
    $search = $request->input('search');

    if (!$search) {
      return redirect()->route('pelanggan.check-daftar')->with('error', 'Tolong masukkan No Kontrol sebelum melakukan pencarian.');
    }

    $pelanggan = Pelanggan::where('no_kontrol', 'like', "%{$search}%")
      ->get();

    return view('dashboard.pelanggan.pelanggan', compact('pelanggan', 'search'));
  }

  public function viewAllDaftarPemakaianPelanggan($id)
  {
    $pelanggan = Pelanggan::with('pemakaians')->findOrFail($id);

    return view('dashboard.pelanggan.pelanggan-all-pemakaian', compact('pelanggan'));
  }
}
