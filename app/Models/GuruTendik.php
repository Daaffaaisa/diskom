<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruTendik extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     * Secara default Laravel akan menggunakan nama plural dari model (guru_tendiks).
     * Tapi karena kita buat tabelnya 'guru_tendik', perlu didefinisikan secara eksplisit.
     *
     * @var string
     */
    protected $table = 'guru_tendik';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'jabatan',
        'bidang_studi',
        'deskripsi',
        'foto', // Jangan lupa tambahin 'foto' di sini
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'foto' => 'array', // Penting: Beri tahu Laravel kalau 'foto' adalah array (JSON)
    ];
}