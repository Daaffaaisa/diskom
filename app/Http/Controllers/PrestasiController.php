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
            'gambar_baru.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambarPaths = [];

        // Proses upload gambar baru jika ada
        if ($request->hasFile('gambar_baru')) {
            foreach ($request->file('gambar_baru') as $gambar) {
                if ($gambar->isValid()) {
                    $fileName = time() . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
                    $targetPath = public_path('assets/prestasi_images');

                    if (!file_exists($targetPath)) {
                        mkdir($targetPath, 0775, true);
                    }

                    $gambar->move($targetPath, $fileName);
                    $gambarPaths[] = 'assets/prestasi_images/' . $fileName;
                    Log::info("Prestasi: File moved successfully: " . 'assets/prestasi_images/' . $fileName);
                } else {
                    Log::warning("Prestasi: Invalid file uploaded: " . $gambar->getClientOriginalName() . " Error: " . $gambar->getError());
                }
            }
        }

        $prestasi = Prestasi::create([
            'judul' => $validatedData['judul'],
            'pencapai' => $validatedData['pencapai'],
            'periode' => $validatedData['periode'],
            'deskripsi_singkat' => $validatedData['deskripsi_singkat'],
            'tahun' => $validatedData['tahun'], // <--- SIMPAN KOLOM TAHUN
            'gambar' => $gambarPaths,
        ]);

        Log::info('Prestasi created successfully:', ['id' => $prestasi->id, 'gambar_paths' => $gambarPaths]);
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
            'gambar_lama' => 'nullable|array',
            'gambar_lama.*' => 'string',
            'gambar_baru.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $currentGambar = $prestasi->gambar ?? [];
        $gambarToKeep = $validatedData['gambar_lama'] ?? [];

        // Hapus gambar lama yang tidak ada di 'gambar_lama'
        foreach ($currentGambar as $path) {
            if (!in_array($path, $gambarToKeep) && str_starts_with($path, 'assets/prestasi_images/')) {
                $fullPathToDelete = public_path($path);
                if (file_exists($fullPathToDelete)) {
                    unlink($fullPathToDelete);
                    Log::info("Prestasi: Deleted old file: " . $fullPathToDelete);
                }
            }
        }

        $newGambarPaths = $gambarToKeep;

        // Proses upload gambar baru jika ada
        if ($request->hasFile('gambar_baru')) {
            foreach ($request->file('gambar_baru') as $gambar) {
                if ($gambar->isValid()) {
                    $fileName = time() . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
                    $targetPath = public_path('assets/prestasi_images');

                    if (!file_exists($targetPath)) {
                        mkdir($targetPath, 0775, true);
                    }

                    $gambar->move($targetPath, $fileName);
                    $newGambarPaths[] = 'assets/prestasi_images/' . $fileName;
                    Log::info("Prestasi: New file moved: " . 'assets/prestasi_images/' . $fileName);
                } else {
                    Log::warning("Prestasi: Invalid new file uploaded: " . $gambar->getClientOriginalName() . " Error: " . $gambar->getError());
                }
            }
        }

        $prestasi->update([
            'judul' => $validatedData['judul'],
            'pencapai' => $validatedData['pencapai'],
            'periode' => $validatedData['periode'],
            'deskripsi_singkat' => $validatedData['deskripsi_singkat'],
            'tahun' => $validatedData['tahun'], // <--- UPDATE KOLOM TAHUN
            'gambar' => $newGambarPaths,
        ]);

        Log::info('Prestasi updated successfully:', ['id' => $prestasi->id, 'gambar_paths' => $newGambarPaths]);
        return response()->json($prestasi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        // Hapus semua gambar terkait dari storage
        if ($prestasi->gambar) {
            foreach ($prestasi->gambar as $path) {
                if (str_starts_with($path, 'assets/prestasi_images/')) {
                    $fullPathToDelete = public_path($path);
                    if (file_exists($fullPathToDelete)) {
                        unlink($fullPathToDelete);
                        Log::info("Prestasi: Deleted associated file: " . $fullPathToDelete);
                    }
                }
            }
        }

        $prestasi->delete();

        Log::info('Prestasi deleted successfully:', ['id' => $id]);
        return response()->json(null, 204);
    }
}