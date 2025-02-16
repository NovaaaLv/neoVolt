<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifSeeder extends Seeder
{
  /**
   * Jalankan seeder untuk tabel tarif.
   */
  public function run(): void
  {
    $tarifs = [
      ['jenis_plg' => 'Rumah Tangga 900 VA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1352.00],
      ['jenis_plg' => 'Rumah Tangga 1.300 VA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1444.70],
      ['jenis_plg' => 'Rumah Tangga 2.200 VA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1444.70],
      ['jenis_plg' => 'Rumah Tangga 3.500-5.500 VA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1699.53],
      ['jenis_plg' => 'Rumah Tangga >6.600 VA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1699.53],
      ['jenis_plg' => 'Bisnis 6.600 VA – 200 kVA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1444.70],
      ['jenis_plg' => 'Bisnis >200 kVA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1114.74],
      ['jenis_plg' => 'Industri >200 kVA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1114.74],
      ['jenis_plg' => 'Industri >30.000 kVA', 'biaya_beban' => 0.00, 'tarif_kwh' => 996.74],
      ['jenis_plg' => 'Pemerintah 6.600 VA – 200 kVA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1699.53],
      ['jenis_plg' => 'Pemerintah >200 kVA', 'biaya_beban' => 0.00, 'tarif_kwh' => 1522.88],
      ['jenis_plg' => 'Penerangan Jalan Umum', 'biaya_beban' => 0.00, 'tarif_kwh' => 1699.53],
      ['jenis_plg' => 'Layanan Khusus', 'biaya_beban' => 0.00, 'tarif_kwh' => 1644.52],
    ];

    DB::table('tarifs')->insert($tarifs);
  }
}
