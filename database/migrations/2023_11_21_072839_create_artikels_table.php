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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->string('slug');
            $table->string('tag');
            $table->text('konten');
            $table->string('gambar');
            $table->integer('users_id');
            $table->enum('jenis', ['Artikel', 'Berita',])->default('Artikel');
            $table->enum('di_posting', ['Ya', 'Tidak',])->default('Tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
