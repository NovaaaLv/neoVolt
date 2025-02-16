<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
  public function index()
  {
    $pelanggan = Pelanggan::get()->all();
    return view('dashboard.pelanggan.pelanggan', compact('pelanggan'));
  }
  public function search(Request $request)
  {
    $search = $request->input('search');

    if (!$search) {
      return redirect()->route('pelanggan.check-daftar')->with('error', 'Tolong masukkan No Kontrol sebelum melakukan pencarian.');
    }

    $pelanggan = Pelanggan::where('no_kontrol', 'like', "%{$search}%")
      ->orWhere('nama', 'like', "%{$search}%")
      ->get();

    return view('dashboard.pelanggan.pelanggan', compact('pelanggan', 'search'));
  }
}
