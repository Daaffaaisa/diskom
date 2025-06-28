<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler; // Import Model Ekstrakurikuler
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Jangan lupa import Log juga!
use App\Http\Controllers\EkstrakurikulerController;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data ekstrakurikuler dari database, diurutkan berdasarkan created_at terbaru
        $ekstrakurikulers = Ekstrakurikuler::orderBy('created_at', 'desc')->get();
        return response()->json($ekstrakurikulers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Request data for Ekstrakurikuler store:', $request->all());

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar_baru.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk multiple gambar
        ]);

        $gambarPaths = [];

        // Proses upload gambar baru jika ada
        if ($request->hasFile('gambar_baru')) {
            foreach ($request->file('gambar_baru') as $gambar) {
                if ($gambar->isValid()) {
                    $fileName = time() . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
                    $targetPath = public_path('assets/ekstrakurikuler_images'); // Path tujuan fisik

                    // Buat folder jika belum ada
                    if (!file_exists($targetPath)) {
                        mkdir($targetPath, 0775, true); // Pastikan izin 0775 saat membuat folder
                    }

                    $gambar->move($targetPath, $fileName); // Pindahkan file langsung ke public/assets
                    $gambarPaths[] = 'assets/ekstrakurikuler_images/' . $fileName; // Simpan path relatif ke public
                    Log::info("Ekstrakurikuler: File moved successfully: " . 'assets/ekstrakurikuler_images/' . $fileName);
                } else {
                    Log::warning("Ekstrakurikuler: Invalid file uploaded: " . $gambar->getClientOriginalName() . " Error: " . $gambar->getError());
                }
            }
        }

        $ekstrakurikuler = Ekstrakurikuler::create([
            'nama' => $validatedData['nama'],
            'deskripsi' => $validatedData['deskripsi'],
            'gambar' => $gambarPaths, // Simpan array path gambar
        ]);

        Log::info('Ekstrakurikuler created successfully:', ['id' => $ekstrakurikuler->id, 'gambar_paths' => $gambarPaths]);
        return response()->json($ekstrakurikuler, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        return response()->json($ekstrakurikuler);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info('Request data for Ekstrakurikuler update:', $request->all());

        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar_lama' => 'nullable|array',
            'gambar_lama.*' => 'string',
            'gambar_baru.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $currentGambar = $ekstrakurikuler->gambar ?? [];
        $gambarToKeep = $validatedData['gambar_lama'] ?? [];

        // Hapus gambar lama yang tidak ada di 'gambar_lama'
        foreach ($currentGambar as $path) {
            if (!in_array($path, $gambarToKeep) && str_starts_with($path, 'assets/ekstrakurikuler_images/')) {
                $fullPathToDelete = public_path($path);
                if (file_exists($fullPathToDelete)) {
                    unlink($fullPathToDelete);
                    Log::info("Ekstrakurikuler: Deleted old file: " . $fullPathToDelete);
                }
            }
        }

        $newGambarPaths = $gambarToKeep;

        // Proses upload gambar baru jika ada
        if ($request->hasFile('gambar_baru')) {
            foreach ($request->file('gambar_baru') as $gambar) {
                if ($gambar->isValid()) {
                    $fileName = time() . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
                    $targetPath = public_path('assets/ekstrakurikuler_images');

                    if (!file_exists($targetPath)) {
                        mkdir($targetPath, 0775, true);
                    }

                    $gambar->move($targetPath, $fileName);
                    $newGambarPaths[] = 'assets/ekstrakurikuler_images/' . $fileName;
                    Log::info("Ekstrakurikuler: New file moved: " . 'assets/ekstrakurikuler_images/' . $fileName);
                } else {
                    Log::warning("Ekstrakurikuler: Invalid new file uploaded: " . $gambar->getClientOriginalName() . " Error: " . $gambar->getError());
                }
            }
        }

        $ekstrakurikuler->update([
            'nama' => $validatedData['nama'],
            'deskripsi' => $validatedData['deskripsi'],
            'gambar' => $newGambarPaths,
        ]);

        Log::info('Ekstrakurikuler updated successfully:', ['id' => $ekstrakurikuler->id, 'gambar_paths' => $newGambarPaths]);
        return response()->json($ekstrakurikuler);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        // Hapus semua gambar terkait dari storage
        if ($ekstrakurikuler->gambar) {
            foreach ($ekstrakurikuler->gambar as $path) {
                if (str_starts_with($path, 'assets/ekstrakurikuler_images/')) {
                    $fullPathToDelete = public_path($path);
                    if (file_exists($fullPathToDelete)) {
                        unlink($fullPathToDelete);
                        Log::info("Ekstrakurikuler: Deleted associated file: " . $fullPathToDelete);
                    }
                }
            }
        }

        $ekstrakurikuler->delete();

        Log::info('Ekstrakurikuler deleted successfully:', ['id' => $id]);
        return response()->json(null, 204);
    }
}