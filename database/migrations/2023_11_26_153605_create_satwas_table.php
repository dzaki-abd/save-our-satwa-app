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
        Schema::create('satwas', function (Blueprint $table) {
            $table->id();
            $table->integer('taxonid');
            $table->string('nama_ilmiah');
            $table->string('nama_lokal');
            $table->string('nama_inggris');
            $table->text('deskripsi');
            $table->string('kingdom');
            $table->string('filum');
            $table->string('kelas');
            $table->string('ordo');
            $table->string('famili');
            $table->string('genus');
            $table->string('tren_populasi');
            $table->string('kategori_iucn');
            $table->string('gambar');
            $table->integer('populasi');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satwas');
    }
};
