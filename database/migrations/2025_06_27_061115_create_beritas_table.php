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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap berita (auto-increment)
            $table->string('judul'); // Judul berita (teks singkat)
            $table->date('tanggal'); // Tanggal berita
            $table->longText('konten'); // Isi berita/konten (teks panjang)
            // Kolom 'gambar' akan menyimpan array JSON dari path gambar relatif.
            // Misalnya: ["berita_1_img1.jpg", "berita_1_img2.jpg"]
            $table->json('gambar')->nullable(); 
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};