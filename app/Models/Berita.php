<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'tanggal',
        'konten',
        'gambar', // Jangan lupa tambahin 'gambar' di sini
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gambar' => 'array', // Ini penting! Beri tahu Laravel kalau 'gambar' adalah array (JSON)
        'tanggal' => 'date', // Ini juga bagus biar 'tanggal' otomatis jadi objek Carbon
    ];
}