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
<<<<<<< HEAD:HealthIn/database/migrations/2024_05_21_020408_create_informaasi_kegiatan_table.php
        Schema::create('informasi_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->string('lokasi');
            $table->string('image');
=======
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('sip')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_editor')->default(false);
            $table->string('nama');
            $table->string('ttl');
>>>>>>> 9ea61cba467d24a9720bc089d806cc0a6a2c065e:HealthIn/database/migrations/2024_05_24_085309_create_dokter_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD:HealthIn/database/migrations/2024_05_21_020408_create_informaasi_kegiatan_table.php
        Schema::dropIfExists('informasi_kegiatan');
=======
        Schema::dropIfExists('dokter');
>>>>>>> 9ea61cba467d24a9720bc089d806cc0a6a2c065e:HealthIn/database/migrations/2024_05_24_085309_create_dokter_table.php
    }
};
