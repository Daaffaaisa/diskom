<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data prestasi dari database, diurutkan berdasarkan created_at terbaru
        $prestasis = Prestasi::orderBy('created_at', 'desc')->get();
        return response()->json($prestasis);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Request data for Prestasi store:', $request->all());

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'pencapai' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 5), // <--- TAMBAH VALIDASI TAHUN
        ]);

        $prestasi = Prestasi::create([
            'judul' => $validatedData['judul'],
            'pencapai' => $validatedData['pencapai'],
            'periode' => $validatedData['periode'],
            'deskripsi_singkat' => $validatedData['deskripsi_singkat'],
            'tahun' => $validatedData['tahun'], // <--- SIMPAN KOLOM TAHUN
        ]);
        return response()->json($prestasi, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return response()->json($prestasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info('Request data for Prestasi update:', $request->all());

        $prestasi = Prestasi::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'pencapai' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 5), // <--- TAMBAH VALIDASI TAHUN
        ]);

        $prestasi->update([
            'judul' => $validatedData['judul'],
            'pencapai' => $validatedData['pencapai'],
            'periode' => $validatedData['periode'],
            'deskripsi_singkat' => $validatedData['deskripsi_singkat'],
            'tahun' => $validatedData['tahun'], // <--- UPDATE KOLOM TAHUN
        ]);
        return response()->json($prestasi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $prestasi->delete();

        Log::info('Prestasi deleted successfully:', ['id' => $id]);
        return response()->json(null, 204);
    }
}