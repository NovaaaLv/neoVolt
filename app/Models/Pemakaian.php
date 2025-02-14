<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemakaian extends Model
{
  use HasFactory;

  protected $fillable = [
    'pelanggan_id',
    'tahun',
    'bulan',
    'meter_awal',
    'meter_akhir',
    'jumlah_pakai',
    'biaya_beban_pemakaian',
    'biaya_pemakaian',
    'status'
  ];

  public function pelanggan(): BelongsTo
  {
    return $this->belongsTo(Pelanggan::class);
  }

  public function getBulanAngkaAttribute()
  {
    $bulanMapping = [
      'January' => 1,
      'February' => 2,
      'March' => 3,
      'April' => 4,
      'May' => 5,
      'June' => 6,
      'July' => 7,
      'August' => 8,
      'September' => 9,
      'October' => 10,
      'November' => 11,
      'December' => 12
    ];

    return $bulanMapping[$this->bulan] ?? $this->bulan;
  }
}
