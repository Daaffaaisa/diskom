<?php

namespace App\Http\Controllers;

use App\Models\Berita; // Jangan lupa import Model Berita
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage with the latest news.
     */
    public function index()
    {
        // Mengambil 3 berita terbaru dari database
        $latestNews = Berita::orderBy('created_at', 'desc')
                            ->limit(3) // <--- Batasi hanya 3 berita
                            ->get();

        // Kirim data berita terbaru ke view 'pages.beranda'
        return view('pages.beranda', compact('latestNews'));
    }
}