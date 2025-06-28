<?php

namespace App\Http\Controllers;

use App\Models\Berita; // Jangan lupa import model Berita
use Illuminate\Http\Request;

class BeritaPublicController extends Controller
{
    /**
     * Display a listing of the resource (for public view).
     */
    public function index()
    {
        // Ambil semua data berita dari database
        // Urutkan berdasarkan tanggal terbaru (created_at atau tanggal berita)
        // Kita pakai created_at karena itu bawaan Laravel dan biasanya lebih akurat untuk urutan posting
        $beritas = Berita::orderBy('created_at', 'desc')->get();

        // Kirim data berita ke view 'berita.blade.php'
       return view('pages.berita', compact('beritas'));
    }

    // Kamu bisa tambahkan method 'show' nanti kalau ada halaman detail berita
    // public function show(Berita $berita)
    // {
    //     return view('berita-detail', compact('berita'));
    // }
}