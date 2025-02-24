<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PetugasController extends Controller
{
  public function viewPembayaranPelanggan()
  {
    $pemakaians = Pemakaian::with('pelanggan')->get();
    return view('dashboard.petugas.pembayaran-pelanggan', compact('pemakaians'));
  }

  public function viewDetailPembayaran($id)
  {
    $pemakaian = Pemakaian::with('pelanggan')->find($id);

    if (!$pemakaian) {
      return redirect()->route('petugas.dashboard')->with('error', 'Data tidak ditemukan');
    }
    $bulanText = Carbon::createFromFormat('m', $pemakaian->bulan)->locale('id')->translatedFormat('F');

    return view('dashboard.petugas.detail-pembayaran', compact('pemakaian', 'bulanText'));
  }


  public function updatePembayaran($id)
  {
    // Cari data pemakaian berdasarkan ID
    $pemakaian = Pemakaian::findOrFail($id);

    // Update status menjadi 'Lunas'
    $pemakaian->update(['status' => 'Lunas']);

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
  }

  public function searchPembayaran(Request $request)
  {
    $search = $request->input('search');

    // Jika input kosong, redirect dengan pesan error
    if (!$search) {
      return redirect()->route('petugas.pembayaran-search')->with('error', 'Tolong masukkan No Kontrol sebelum melakukan pencarian.');
    }

    // Cari data berdasarkan No Kontrol yang diinputkan
    $pemakaians = Pemakaian::whereHas('pelanggan', function ($query) use ($search) {
      $query->where('no_kontrol', 'like', "%{$search}%");
    })->get();

    return view('dashboard.petugas.pembayaran-pelanggan', compact('pemakaians', 'search'));
  }
}
