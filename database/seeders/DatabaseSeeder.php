<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::create([
      'name' => 'Admin User',
      'email' => 'admin@example.com',
      'role' => 'admin',
      'password' => Hash::make('password123'),
    ]);

    User::create([
      'name' => 'Petugas',
      'email' => 'petugas@example.com',
      'role' => 'petugas',
      'password' => Hash::make('password123'),
    ]);

    User::create([
      'name' => 'Petugas Lapangan',
      'email' => 'petugas_lapangan@example.com',
      'role' => 'petugas_lapangan',
      'password' => Hash::make('password123'),
    ]);
  }
}
