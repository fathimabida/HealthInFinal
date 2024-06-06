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
        Schema::create('hasil_mcu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('nama_pemeriksaan');
            $table->enum('hasil', ['Negatif', 'Positif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_mcu');
    }
};