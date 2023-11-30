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
        Schema::create('pelaporans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu_kejadian');
            $table->string('lokasi_kejadian');
            $table->string('jenis_pelanggaran');
            $table->string('jenis_satwa');
            $table->text('deskripsi_kejadian');
            $table->string('tindak_lanjut')->nullable();
            $table->string('hasil_investigasi')->nullable();
            $table->string('catatan_tambahan')->nullable();
            $table->enum('status', ['Ditinjau', 'Disetujui', 'Ditolak'])->default('Ditinjau');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaporans');
    }
};
