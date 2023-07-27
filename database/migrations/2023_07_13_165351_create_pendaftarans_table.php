<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_pendaftaran')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_panggilan')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->tinyInteger('usia')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('agama')->nullable();
            $table->string('jumlah_saudara')->nullable();
            $table->string('tinggal_bersama')->nullable();
            $table->string('pas_foto')->nullable();

            //Kontak
            $table->string('email')->nullable();
            $table->string('no_hp_ayah')->nullable();
            $table->string('no_hp_ibu')->nullable();

            // Alamat lengkap
            $table->string('alamat')->nullable();

            //data orang tua
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('penghasilan_ibu')->nullable();

            //data kesehatan anak
            $table->string('penyakit_anak')->nullable();
            $table->string('makanan_bayi')->nullable();
            $table->string('penyakit_kambuh')->nullable();

            //data tambahan anak
            $table->string('perkembangan_moral')->nullable();
            $table->string('perkembangan_motorik')->nullable();
            $table->string('perkembangan_bahasa')->nullable();


            $table->string('status_pendaftaran')->nullable();
            $table->datetime('tgl_pendaftaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
