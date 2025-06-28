<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException; // <--- TAMBAHKAN INI

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua user, kecuali user yang sedang login saat ini (admin itu sendiri)
        // Order berdasarkan nama
        $users = User::where('id', '!=', auth()->id())
                     ->orderBy('name', 'asc')
                     ->get();

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Request data for User store:', $request->all());

        try { // <--- MULAI BLOK TRY
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|string|in:admin,user,siswa',
            ]);
            Log::info('Validation passed.'); // <--- Log ini sekarang harusnya muncul kalau validasi sukses
        } catch (ValidationException $e) { // <--- TANGKAP VALIDATIONEXCEPTION
            Log::warning('Validation failed for User store:', ['errors' => $e->errors()]);
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422); // <--- PAKSA RESPONS JSON 422
        }


        // Password akan otomatis di-hash karena ada 'password' => 'hashed' di $casts User model
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'role' => $validatedData['role'],
        ]);

        Log::info('User created successfully:', ['id' => $user->id, 'email' => $user->email]);
        return response()->json($user, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info('Request data for User update:', $request->all());

        $user = User::findOrFail($id);

        try { // <--- MULAI BLOK TRY
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'password' => 'nullable|string|min:8',
                'role' => 'required|string|in:admin,user,siswa',
            ]);
            Log::info('Validation passed for User update.'); // <--- Log ini sekarang harusnya muncul
        } catch (ValidationException $e) { // <--- TANGKAP VALIDATIONEXCEPTION
            Log::warning('Validation failed for User update:', ['errors' => $e->errors()]);
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422); // <--- PAKSA RESPONS JSON 422
        }

        // Pastikan admin tidak bisa mengubah role-nya sendiri dari form ini
        // (Logic ini sekarang ada setelah validasi, jadi $validatedData sudah pasti ada)
        if (auth()->id() == $user->id && $validatedData['role'] !== $user->role) {
            if (User::where('role', 'admin')->count() > 1) {
                 Log::warning('Admin tried to change own role.', ['user_id' => auth()->id(), 'attempted_role' => $validatedData['role']]);
                 unset($validatedData['role']); // Hapus role dari data update agar tidak diupdate
            }
        }

        $dataToUpdate = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
        ];

        // Jika password diisi, hash dan tambahkan ke data update
        if (!empty($validatedData['password'])) {
            $dataToUpdate['password'] = $validatedData['password'];
        }

        $user->update($dataToUpdate);

        Log::info('User updated successfully:', ['id' => $user->id, 'email' => $user->email]);
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Pencegahan: Admin tidak bisa menghapus akunnya sendiri
        if (auth()->id() == $user->id) {
            Log::warning('Admin tried to delete self.', ['user_id' => auth()->id()]);
            return response()->json(['message' => 'Anda tidak bisa menghapus akun Anda sendiri!'], 403); // 403 Forbidden
        }

        // Pencegahan: Jangan biarkan admin menghapus semua admin lain jika dia bukan super-admin (optional)
        if ($user->role == 'admin' && User::where('role', 'admin')->count() <= 1) {
            Log::warning('Attempt to delete last admin account.', ['user_id' => auth()->id(), 'target_user_id' => $user->id]);
            return response()->json(['message' => 'Tidak bisa menghapus satu-satunya akun admin yang tersisa!'], 403);
        }

        $user->delete();

        Log::info('User deleted successfully:', ['id' => $id, 'email' => $user->email]);
        return response()->json(null, 204); // 204 No Content
    }
}