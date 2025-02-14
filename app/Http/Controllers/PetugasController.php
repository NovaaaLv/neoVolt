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
}
