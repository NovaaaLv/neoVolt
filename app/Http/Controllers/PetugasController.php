<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemakaian;
use Illuminate\Http\Request;

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

    return view('dashboard.petugas.detail-pembayaran', compact('pemakaian'));
  }
}
