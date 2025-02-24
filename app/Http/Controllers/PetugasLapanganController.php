<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemakaian;
use App\Models\Tarif;
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

  public function detailDaftarPelanggan($id)
  {
    $pelanggan = Pelanggan::find($id);
    $tarifs = Tarif::get();
    return view('dashboard.petugas_lapangan.detail-daftar-pelanggan', compact(['pelanggan', 'tarifs']));
  }

  public function updateProfile(Request $request, $id)
  {
    $request->validate([
      'no_telp' => 'numeric|required',
      'tarif_id' => 'required|exists:tarifs,id',
    ], [
      'no_telp.required' => 'Nomor telepon wajib diisi.',
      'no_telp.numeric' => 'Nomor telepon harus berupa angka.',
      'no_telp.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
      'tarif_id.required' => 'Silakan pilih jenis pelanggan.',
      'tarif_id.exists' => 'Jenis pelanggan tidak valid.',
    ]);

    try {
      $pelanggan = Pelanggan::findOrFail($id);
      $pelanggan->update([
        'no_telp' => $request->no_telp,
        'tarif_id' => $request->tarif_id
      ]);

      return redirect()->route('petugas-lapangan.daftar-pelanggan.detail')
        ->with('success', 'Pelanggan berhasil diperbarui.');
    } catch (\Exception $e) {
      return redirect()->back()
        ->with('error', 'Terjadi kesalahan saat memperbarui pelanggan. Silakan coba lagi.');
    }
  }

  public function updatePemakaian(Request $request, $id)
  {
    $request->validate([
      'tahun' => 'numeric|required',
      'bulan' => 'string|required',
      'meter_awal' => 'numeric|required',
      'meter_akhir' => 'numeric|required',
    ]);

    // Debug: Periksa apakah pelanggan ditemukan
    $pelanggan = Pelanggan::with('tarif')->find($id);

    if (!$pelanggan || !$pelanggan->tarif) {
      return back()->with('error', 'Data pelanggan atau tarif tidak ditemukan.');
    }

    $bulanSebelumnya = $request->bulan - 1;
    $tahunSebelumnya = $request->tahun;

    if ($bulanSebelumnya == 0) {
      $bulanSebelumnya = 12;
      $tahunSebelumnya -= 1;
    }

    // Cek apakah ada data pemakaian sebelumnya
    $pemakaianSebelumnya = Pemakaian::where('pelanggan_id', $id)
      ->where('tahun', $tahunSebelumnya)
      ->where('bulan', $bulanSebelumnya)
      ->first();

    // Jika ada, gunakan jumlah_pakai sebagai meter_awal
    $meterAwal = $pemakaianSebelumnya ? $pemakaianSebelumnya->jumlah_pakai : 0;


    $biaya_beban_pemakaian = $pelanggan->tarif->biaya_beban;
    $tarifKwh = $pelanggan->tarif->tarif_kwh;
    $jumlah_pakai = $request->meter_akhir - $request->meter_awal;
    $biaya_pemakaian = intval($jumlah_pakai * $tarifKwh);

    $pemakaian = new Pemakaian();
    $pemakaian->pelanggan_id = $id;
    $pemakaian->tahun = $request->tahun;
    $pemakaian->bulan = $request->bulan;
    $pemakaian->meter_awal = $meterAwal;
    $pemakaian->meter_akhir = $request->meter_akhir;
    $pemakaian->jumlah_pakai = $jumlah_pakai;
    $pemakaian->biaya_beban_pemakaian = $biaya_beban_pemakaian;
    $pemakaian->biaya_pemakaian = $biaya_pemakaian;
    $pemakaian->status = 'Belum Bayar';
    $pemakaian->save();

    return redirect()->route('petugas-lapangan.tambah-pemakaian.success', ['id' => $pelanggan->id]);
  }


  public function addPemakaianSuccess($id)
  {
    $pelanggan = Pelanggan::find($id);
    return view('dashboard.petugas_lapangan.success-tambah-pemakaian', compact('pelanggan'));
  }
}
