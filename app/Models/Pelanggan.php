<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
  use HasFactory;

  protected $fillable = [
    'no_kontrol',
    'nama',
    'alamat',
    'no_telp',
    'tarif_id',
  ];

  public function tarif(): BelongsTo
  {
    return $this->belongsTo(Tarif::class);
  }

  public function pemakaians(): HasMany
  {
    return $this->hasMany(Pemakaian::class);
  }
}
