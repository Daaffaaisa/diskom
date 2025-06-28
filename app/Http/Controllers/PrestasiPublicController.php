<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PrestasiPublicController extends Controller
{
    /**
     * Display a listing of unique years for prestasi.
     */
    public function index()
    {
        // Mengambil semua tahun unik dari kolom 'tahun' di tabel 'prestasis' (PERUBAHAN DI SINI)
        // dan mengurutkannya dari tahun terbaru.
        $years = DB::table('prestasis')
                   ->select('tahun') // <--- UBAH: Ambil kolom 'tahun' langsung
                   ->distinct()
                   ->orderBy('tahun', 'desc') // <--- UBAH: Urutkan berdasarkan 'tahun'
                   ->get();

        // Kirim koleksi tahun-tahun ini ke view 'pages.akademik.prestasi'
        return view('pages.akademik.prestasi', compact('years'));
    }

    /**
     * Display a listing of prestasis for a specific year.
     */
    public function showByYear(int $year)
    {
        if ($year <= 0 || $year > Carbon::now()->year + 5) {
            abort(404);
        }

        // Ambil semua prestasi yang memiliki kolom 'tahun' yang sama dengan $year (PERUBAHAN DI SINI)
        $prestasis = Prestasi::where('tahun', $year) // <--- UBAH: Filter berdasarkan kolom 'tahun'
                             ->orderBy('created_at', 'desc')
                             ->get();

        return view('pages.akademik.prestasi.prestasi_detail_tahun', compact('prestasis', 'year'));
    }
}