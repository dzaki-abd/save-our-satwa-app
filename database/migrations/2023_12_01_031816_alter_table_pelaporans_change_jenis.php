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
        Schema::table('pelaporans', function (Blueprint $table) {
            $table->dropColumn('jenis_pelanggaran');
            $table->foreignId('pelanggaran_id')->nullable()->after('lokasi_kejadian');
            $table->string('pelanggaran_lain')->nullable()->after('pelanggaran_id');
            $table->dropColumn('jenis_satwa');
            $table->foreignId('satwa_id')->nullable()->after('pelanggaran_lain');
            $table->string('satwa_lain')->nullable()->after('satwa_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelaporans', function (Blueprint $table) {
            //
        });
    }
};