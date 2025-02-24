<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
  public function exportPemakaian($id)
  {
    $pemakaian = Pemakaian::with('pelanggan')->findOrFail($id);

    $data = [
      'date' => date('m/d/y'),
      'pemakaian' => $pemakaian
    ];

    $pdf = Pdf::loadView('PDF.export-pemakaian', $data)->setPaper(['0', 'o', '310', '415']);

    $namaPelanggan = preg_replace('/[^A-Za-z0-9\- ]/', '', $pemakaian->pelanggan->nama ?? 'Pemakaian');
    $fileName = 'Neo Volt ' . $namaPelanggan . '-' . date('Ymd') . '.pdf';

    return $pdf->download($fileName);
  }
}
