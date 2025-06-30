<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeluhKesah;

class KeluhKesahController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100',
        ]);

        KeluhKesah::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return response()->json(['success' => true, 'message' => 'Pesan berhasil dikirim!']);
    }

    public function index()
{
    return KeluhKesah::orderBy('created_at', 'desc')->get();
}

}
