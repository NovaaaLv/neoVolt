<?php

namespace App\Http\Controllers;

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
}
