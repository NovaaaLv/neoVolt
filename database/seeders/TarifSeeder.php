<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $tarifs = [
      ['jenis_plg' => 'Rumah Tangga', 'biaya_beban' => 5000.00, 'tarif_kwh' => 1350.50],
      ['jenis_plg' => 'Bisnis Kecil', 'biaya_beban' => 10000.00, 'tarif_kwh' => 1450.75],
      ['jenis_plg' => 'Industri Kecil', 'biaya_beban' => 15000.00, 'tarif_kwh' => 1550.30],
      ['jenis_plg' => 'Perkantoran', 'biaya_beban' => 20000.00, 'tarif_kwh' => 1650.40],
      ['jenis_plg' => 'Hotel', 'biaya_beban' => 25000.00, 'tarif_kwh' => 1750.60],
      ['jenis_plg' => 'Restoran', 'biaya_beban' => 12000.00, 'tarif_kwh' => 1400.20],
      ['jenis_plg' => 'Supermarket', 'biaya_beban' => 18000.00, 'tarif_kwh' => 1600.90],
      ['jenis_plg' => 'Pabrik', 'biaya_beban' => 30000.00, 'tarif_kwh' => 1850.75],
      ['jenis_plg' => 'Mall', 'biaya_beban' => 35000.00, 'tarif_kwh' => 1900.45],
      ['jenis_plg' => 'Rumah Sakit', 'biaya_beban' => 28000.00, 'tarif_kwh' => 1800.25],
    ];

    DB::table('tarifs')->insert($tarifs);
  }
}
