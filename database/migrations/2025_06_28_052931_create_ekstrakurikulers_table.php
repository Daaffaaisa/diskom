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
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap ekstrakurikuler
            $table->string('nama'); // Nama ekstrakurikuler (misal "Paskibra", "Pramuka")
            $table->text('deskripsi')->nullable(); // Deskripsi lengkap ekstrakurikuler
            $table->json('gambar')->nullable(); // Kolom untuk menyimpan array JSON dari path gambar relatif
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};