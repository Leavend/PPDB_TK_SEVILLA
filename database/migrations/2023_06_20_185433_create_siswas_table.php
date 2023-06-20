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
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('nik', 30)->primary();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('tinggal_bersama');
            $table->string('tahun_ajar');
            $table->string('jenjang');
            $table->string('jumlah_saudara');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('anak_ke');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
