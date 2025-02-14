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
    Schema::create('pelanggans', function (Blueprint $table) {
      $table->id();
      $table->integer('no_kontrol')->unique();
      $table->string('nama');
      $table->text('alamat');
      $table->string('no_telp');

      $table->foreignId('tarif_id')->constrained('tarifs')->cascadeOnDelete();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('pelanggans');
  }
};
