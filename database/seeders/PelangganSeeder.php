<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // $pelanggans = [];
    // for ($i = 1; $i <= 10; $i++) {
    //   $pelanggans[] = [
    //     'no_kontrol' => rand(100000, 999999),
    //     'nama' => 'Pelanggan ' . $i,
    //     'alamat' => 'Alamat Pelanggan ' . $i,
    //     'no_telp' => '08' . rand(1000000000, 9999999999),
    //     'tarif_id' => rand(1, 10),
    //     'created_at' => now(),
    //     'updated_at' => now(),
    //   ];
    // }

    // DB::table('pelanggans')->insert($pelanggans);

    Pelanggan::create([
      'no_kontrol' => 12398751,
      'nama' => 'Fabian Jade',
      'alamat' => 'Jln Soeharto jakarta jawabarat',
      'no_telp' => null,
      'tarif_id' => null,
    ]);
  }
}
