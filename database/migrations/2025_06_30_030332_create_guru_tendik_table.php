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
        Schema::create('guru_tendik', function (Blueprint $table) {
            $table->id(); // ID unik
            $table->string('nama'); // Nama lengkap
            $table->string('jabatan'); // Jabatan (misal: Guru, Staf TU, Kepala Sekolah)
            $table->string('bidang_studi')->nullable(); // Bidang studi (misal: Matematika, Bahasa Indonesia), nullable
            $table->json('foto')->nullable(); // Kolom untuk menyimpan array JSON dari path foto/gambar
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_tendik');
    }
};