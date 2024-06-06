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
        Schema::create('dukungan_kesehatan_mental', function (Blueprint $table) {
            $table->id();
            $table->string('section');
            $table->string('judul_guideline');
            $table->string('ciri_awal');
            $table->string('pertolongan_pertama');
            $table->string('harus_dihindari');
            $table->string('url_guideline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dukungan_kesehatan_mental');
    }
};
