<?php

namespace App\Http\Controllers;

use App\Models\GuruTendik;
use Illuminate\Http\Request;

class GuruTendikPublicController extends Controller
{
    /**
     * Tampilkan halaman profil sekolah (public) dengan data guru & tendik dari DB.
     */
    public function index()
    {
        $guruTendik = GuruTendik::orderBy('id')->get(); // atau bisa pakai orderBy('id') juga

        return view('pages.profile', compact('guruTendik'));
    }
}
