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
        Schema::create('surat_rujukan', function (Blueprint $table) {
            $table->id();
            $table->string('dokter_rujukan');
            $table->string('rs_rujukan');
            $table->string('dokter_perujuk');
            $table->date('tgl_rujuk');
            $table->string('nim_pasien');
            $table->string('nama_pasien');
            $table->string('diagnosa');
            $table->date('masa_berlaku');
            $table->string('file_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_rujukan');
    }
};