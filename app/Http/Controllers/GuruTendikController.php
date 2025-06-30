<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruTendik;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class GuruTendikController extends Controller
{
    public function index()
    {
        return response()->json(GuruTendik::orderBy('created_at', 'desc')->get());
    }

    public function show($id)
    {
        return response()->json(GuruTendik::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time().'_'.uniqid().'.'.$foto->getClientOriginalExtension();
            $path = 'assets/guruTendik_images/'.$filename;
            $foto->move(public_path('assets/guruTendik_images'), $filename);
        }

        $guru = GuruTendik::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $path
        ]);

        return response()->json([
            'message' => 'Guru / Tendik berhasil ditambahkan.',
            'data' => $guru
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $guru = GuruTendik::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $guru->foto;

        if ($request->hasFile('foto')) {
            if ($path && file_exists(public_path($path))) {
                unlink(public_path($path));
            }
            $foto = $request->file('foto');
            $filename = time().'_'.uniqid().'.'.$foto->getClientOriginalExtension();
            $path = 'assets/guruTendik_images/'.$filename;
            $foto->move(public_path('assets/guruTendik_images'), $filename);
        }

        $guru->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $path
        ]);

        return response()->json([
            'message' => 'Guru / Tendik berhasil diperbarui.',
            'data' => $guru
        ]);
    }

    public function destroy($id)
    {
        $guru = GuruTendik::findOrFail($id);

        if ($guru->foto && file_exists(public_path($guru->foto))) {
            unlink(public_path($guru->foto));
        }

        $guru->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
