<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('pemakaians', function (Blueprint $table) {
      $table->id();
      $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade');
      $table->integer('tahun');
      $table->enum('bulan', ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
      $table->integer('meter_awal');
      $table->integer('meter_akhir')->nullable();
      $table->integer('jumlah_pakai')->nullable();
      $table->integer('biaya_pemakaian')->nullable();
      $table->integer('biaya_beban_pemakaian');
      $table->enum('status', ['Belum Bayar', 'Lunas'])->default('Belum Bayar');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('pemakaians');
  }
};
