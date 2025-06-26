<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluhKesah extends Model
{
    use HasFactory;
    protected $table = 'keluh_kesah'; // ← ini solusinya
    protected $fillable = [
        'user_id', 'name', 'email', 'message'
    ];
}

