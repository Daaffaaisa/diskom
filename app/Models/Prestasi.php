<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'pencapai',
        'periode',
        'deskripsi_singkat',
        'gambar',
        'tahun', // Jangan lupa tambahin 'gambar' di sini
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gambar' => 'array', // Penting: Beri tahu Laravel kalau 'gambar' adalah array (JSON)
    ];
}