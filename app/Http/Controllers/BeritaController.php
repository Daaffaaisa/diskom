<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk manage file
use Illuminate\Support\Facades\Log;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data berita dari database, diurutkan dari yang terbaru
        $beritas = Berita::orderBy('created_at', 'desc')->get();
        
        // Kembalikan data dalam format JSON
        return response()->json($beritas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Store method hit. Request data:', $request->all());

        // Validasi data yang masuk
                 $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'konten' => 'required|string',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk multiple images
            ]);  

            Log::info('Validation passed.');

        $gambarPaths = [];
        // Cek apakah ada file gambar yang diupload
if ($request->hasFile('gambar_baru')) {
                Log::info('Files detected for gambar_baru. Processing files...');
                foreach ($request->file('gambar_baru') as $index => $image) {
                    if ($image->isValid()) {
                        $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $targetPath = public_path('assets/berita_images'); // Path tujuan fisik
                        $fullTargetPath = $targetPath . DIRECTORY_SEPARATOR . $fileName;

                        Log::info("Attempting to move file #{$index}: {$image->getClientOriginalName()} to {$fullTargetPath}");

                        try {
                            // Cek apakah direktori ada, jika tidak, buat
                            if (!file_exists($targetPath)) {
                                mkdir($targetPath, 0775, true); // Pastikan izin 0775 saat membuat folder
                                Log::info("Created directory: {$targetPath}");
                            }

                            $image->move($targetPath, $fileName); // Lakukan pemindahan file
                            $gambarPaths[] = 'assets/berita_images/' . $fileName;
                            Log::info("File #{$index} moved successfully. Path saved: " . $gambarPaths[count($gambarPaths)-1]);
                        } catch (\Exception $e) {
                            Log::error("Failed to move file #{$index} ({$image->getClientOriginalName()}): " . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                            // Jika ada error move, kita log detailnya
                        }
                    } else {
                        Log::warning("File #{$index} ({$image->getClientOriginalName()}) is not valid. Error code: " . $image->getError() . ". Message: " . $image->getErrorMessage());
                    }
                }
            } else {
                Log::info('No files detected for gambar_baru from hasFile(). This means $_FILES was empty or key mismatch.');
            }

        // Buat record berita baru di database
        $berita = Berita::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
            'gambar' => $gambarPaths, // Simpan array path gambar ke kolom 'gambar' (akan di-JSON-encode otomatis)
        ]);

        // Beri respons sukses
        return response()->json(['message' => 'Berita berhasil ditambahkan!', 'berita' => $berita], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        // Kembalikan data satu berita dalam format JSON
        return response()->json($berita);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'konten' => 'required|string',
            'gambar_baru.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Untuk gambar baru
            'gambar_lama' => 'nullable|array', // Untuk daftar gambar lama yang masih dipertahankan
            'gambar_lama.*' => 'string',
        ]);

        $currentGambar = $berita->gambar ?: []; // Ambil gambar yang sudah ada
        $gambarLamaYangDipertahankan = $request->input('gambar_lama', []); // Gambar lama yang masih ada (dari frontend)

        // Filter gambar lama yang tidak ada di 'gambar_lama' request (berarti dihapus)
        foreach ($currentGambar as $path) {
            if (!in_array($path, $gambarLamaYangDipertahankan)) {
                // Hapus file fisik gambar yang tidak dipertahankan
                if (Storage::disk('public_uploads')->exists($path)) {
                    Storage::disk('public_uploads')->delete($path);
                }
            }
        }
        
        // Gabungkan gambar lama yang dipertahankan dengan gambar baru
        $newGambarPaths = $gambarLamaYangDipertahankan;

        // Upload gambar baru
        if ($request->hasFile('gambar_baru')) {
            foreach ($request->file('gambar_baru') as $image) {
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/berita_images'), $fileName);
                $newGambarPaths[] = 'assets/berita_images/' . $fileName;
            }
        }

        // Update data berita
        $berita->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
            'gambar' => $newGambarPaths, // Update dengan array path gambar yang baru
        ]);

        return response()->json(['message' => 'Berita berhasil diupdate!', 'berita' => $berita]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        // Hapus file gambar terkait dari storage
        if ($berita->gambar) {
            foreach ($berita->gambar as $path) {
                // Pastikan path-nya relatif ke direktori public, lalu gunakan Storage facade
                // Karena kita pakai move(public_path(...)), maka path yang disimpan sudah relatif
                // ke public folder, jadi kita bisa pakai Storage::disk('public_uploads')
                if (Storage::disk('public_uploads')->exists($path)) {
                    Storage::disk('public_uploads')->delete($path);
                }
            }
        }

        // Hapus record berita dari database
        $berita->delete();

        return response()->json(['message' => 'Berita berhasil dihapus!']);
    }
}