<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  public function addPetugas(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:6',
      'role' => 'required|in:petugas,petugas_lapangan'
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $request->role
    ]);

    return redirect()->route('admin.dashboard-add-petugas')->with('success', 'Petugas berhasil ditambahkan!');
  }

  public function editPetugas($id)
  {
    $petugas = User::findOrFail($id);
    return view('dashboard.admin.update-petugas', compact('petugas'));
  }

  public function updatePetugas(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users,email,' . $id,
      'role' => 'required|in:petugas,petugas_lapangan',
    ]);

    $petugas = User::findOrFail($id);
    $petugas->update([
      'name' => $request->name,
      'email' => $request->email,
      'role' => $request->role,
    ]);

    return redirect()->route('admin.dashboard-daftar-petugas')->with('success', 'Data petugas berhasil diperbarui');
  }

  public function deletePetugas($id)
  {
    $petugas = User::findOrFail($id);
    $petugas->delete();

    return redirect()->route('admin.dashboard-daftar-petugas')->with('success', 'Petugas berhasil dihapus');
  }


  public function AddTarif(Request $request)
  {
    $request->validate([
      'jenis_plg' => 'required|string|max:255',
      'biaya_beban' => 'required|numeric',
      'tarif_kwh' => 'required|numeric',
    ]);

    Tarif::create([
      'jenis_plg' => $request->jenis_plg,
      'biaya_beban' => $request->biaya_beban,
      'tarif_kwh' => $request->tarif_kwh
    ]);

    return redirect()->route('admin.dashboard-add-tarif')->with('success', 'Tarif berhasil ditambahkan!');
  }

  public function EditTarif($id)
  {
    $tarif = Tarif::findOrFail($id);
    return view('dashboard.admin.update-tarif', compact('tarif'));
  }

  public function UpdateTarif(Request $request, $id)
  {
    // Validasi input
    $request->validate([
      'jenis_plg' => 'required|string|max:255',
      'biaya_beban' => 'required|numeric|min:0',
      'tarif_kwh' => 'required|numeric|min:0',
    ]);

    // Cari tarif berdasarkan ID
    $tarif = Tarif::findOrFail($id);

    // Update data tarif
    $tarif->update([
      'jenis_plg' => $request->jenis_plg,
      'biaya_beban' => $request->biaya_beban,
      'tarif_kwh' => $request->tarif_kwh,
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.dashboard-daftar-tarif')->with('success', 'Tarif berhasil diperbarui');
  }

  public function deleteTarif($id)
  {
    $tarif = Tarif::findOrFail($id);
    $tarif->delete();

    return redirect()->route('admin.dashboard-daftar-tarif')->with('success', 'Tarif berhasil dihapus');
  }
}
