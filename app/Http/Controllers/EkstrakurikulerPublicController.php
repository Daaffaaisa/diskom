<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler; // Jangan lupa import Model Ekstrakurikuler
use Illuminate\Http\Request;

class EkstrakurikulerPublicController extends Controller
{
    /**
     * Display a listing of all ekstrakurikuler for the public view.
     */
    public function index()
    {
        // Mengambil semua data ekstrakurikuler dari database, diurutkan berdasarkan nama
        $ekstrakurikulers = Ekstrakurikuler::orderBy('nama', 'asc')->get();

        // Kirim data ekstrakurikuler ke view 'pages.akademik.ekstrakulikuler'
        return view('pages.akademik.ekstrakulikuler', compact('ekstrakurikulers'));
    }
}