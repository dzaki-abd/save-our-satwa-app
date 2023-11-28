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
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_donatur')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('bukti_transfer');
            $table->string('jumlah_donasi');
            $table->enum('status', ['Belum Diverifikasi', 'Sudah Diverifikasi',])->default('Belum Diverifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
