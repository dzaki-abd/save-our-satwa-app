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
        Schema::create('histori_laporans', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_pelanggaran', ['Perburuan Liar', 'Perdagangan Satwa Liar', 'Lainnya']);
            $table->string('tindak_lanjut');
            $table->string('pelaporan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_laporans');
    }
};
