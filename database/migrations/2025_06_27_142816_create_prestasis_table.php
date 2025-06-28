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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap prestasi
            $table->string('judul'); // Judul prestasi
            $table->string('pencapai'); // Siapa yang meraih prestasi
            $table->string('periode'); // Untuk tanggal/bulan yang fleksibel (contoh: "Mei 2024")
            $table->text('deskripsi_singkat')->nullable(); // Deskripsi singkat prestasi
            $table->json('gambar')->nullable(); // Kolom untuk menyimpan array JSON dari path gambar relatif
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};