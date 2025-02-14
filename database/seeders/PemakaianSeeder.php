<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PemakaianSeeder extends Seeder
{
  /**
   * Jalankan database seeders.
   */
  public function run(): void
  {
    // Pastikan ada pelanggan sebelum menambahkan pemakaian
    $pelanggan = DB::table('pelanggans')->inRandomOrder()->first();

    if (!$pelanggan) {
      $this->command->warn('Tidak ada pelanggan ditemukan. Silakan isi tabel pelanggans terlebih dahulu.');
      return;
    }

    // Data pemakaian untuk beberapa bulan
    $data = [
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'January',
        'meter_awal' => 1000,
        'meter_akhir' => 1200,
        'jumlah_pakai' => 200,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 200 * 1500, // Rp1.500/KWH
        'status' => 'Belum Bayar',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'February',
        'meter_awal' => 1200,
        'meter_akhir' => 1400,
        'jumlah_pakai' => 200,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 200 * 1500,
        'status' => 'Lunas',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'March',
        'meter_awal' => 1400,
        'meter_akhir' => 1650,
        'jumlah_pakai' => 250,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 250 * 1500,
        'status' => 'Belum Bayar',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'April',
        'meter_awal' => 1650,
        'meter_akhir' => 1900,
        'jumlah_pakai' => 250,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 250 * 1500,
        'status' => 'Lunas',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'May',
        'meter_awal' => 1900,
        'meter_akhir' => 2200,
        'jumlah_pakai' => 300,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 300 * 1500,
        'status' => 'Belum Bayar',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'June',
        'meter_awal' => 2200,
        'meter_akhir' => 2500,
        'jumlah_pakai' => 300,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 300 * 1500,
        'status' => 'Lunas',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'July',
        'meter_awal' => 2500,
        'meter_akhir' => 2750,
        'jumlah_pakai' => 250,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 250 * 1500,
        'status' => 'Belum Bayar',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'August',
        'meter_awal' => 2750,
        'meter_akhir' => 3000,
        'jumlah_pakai' => 250,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 250 * 1500,
        'status' => 'Lunas',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'September',
        'meter_awal' => 3000,
        'meter_akhir' => 3300,
        'jumlah_pakai' => 300,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 300 * 1500,
        'status' => 'Belum Bayar',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'October',
        'meter_awal' => 3300,
        'meter_akhir' => 3550,
        'jumlah_pakai' => 250,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 250 * 1500,
        'status' => 'Lunas',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'November',
        'meter_awal' => 3550,
        'meter_akhir' => 3800,
        'jumlah_pakai' => 250,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 250 * 1500,
        'status' => 'Belum Bayar',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'pelanggan_id' => $pelanggan->id,
        'tahun' => 2024,
        'bulan' => 'December',
        'meter_awal' => 3800,
        'meter_akhir' => 4000,
        'jumlah_pakai' => 200,
        'biaya_beban_pemakaian' => 5000,
        'biaya_pemakaian' => 200 * 1500,
        'status' => 'Lunas',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
    ];

    DB::table('pemakaians')->insert($data);
  }
}
