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
}
