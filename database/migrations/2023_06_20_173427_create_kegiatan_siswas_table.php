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
        Schema::create('kegiatan_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30);
            $table->string('slug', 255)->unique();
            $table->string('thumbnail', 255)->nullable();
            $table->text('body');
            // $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_siswas');
    }
};
