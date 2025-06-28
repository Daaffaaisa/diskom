<?php

namespace App\Http\Controllers;

use App\Models\User; // Import Model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Untuk Hash::make() jika password tidak di-cast 'hashed' di model (tapi kita sudah)
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule; // Untuk validasi unique email kecuali diri sendiri

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua user, kecuali user yang sedang login saat ini (admin itu sendiri)
        // Order berdasarkan nama
        $users = User::where('id', '!=', auth()->id()) // Jangan tampilkan admin yang sedang login
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

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Email harus unik
            'password' => 'required|string|min:8', // Password minimal 8 karakter
            'role' => 'required|string|in:admin,user,siswa', // Role harus salah satu dari ini
        ]);

        // Password akan otomatis di-hash karena ada 'password' => 'hashed' di $casts User model
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], // Langsung pakai, model akan hash otomatis
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

        // Validasi, email harus unik kecuali untuk user itu sendiri
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8', // Password opsional, hanya diisi jika ingin diubah
            'role' => 'required|string|in:admin,user,siswa',
        ]);

        // Pastikan admin tidak bisa mengubah role-nya sendiri dari form ini
        // Jika ada admin lain yang sedang login
        if (auth()->id() == $user->id && $validatedData['role'] !== $user->role) {
            // Jika admin mencoba mengubah role-nya sendiri, tapi bukan satu-satunya admin
            // Ini bisa ditangani di frontend atau validasi yang lebih kompleks
            // Untuk sementara, kita bisa blok di backend atau tampilkan pesan error
            if (User::where('role', 'admin')->count() > 1) { // Jika ada admin lain
                 Log::warning('Admin tried to change own role.', ['user_id' => auth()->id(), 'attempted_role' => $validatedData['role']]);
                 // Hapus role dari data yang divalidasi agar tidak diupdate
                 unset($validatedData['role']);
                 showCustomAlert("Anda tidak bisa mengubah role akun Anda sendiri.","warning"); // Ini harus difrontend
            }
        }


        $dataToUpdate = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
        ];

        // Jika password diisi, hash dan tambahkan ke data update
        if (!empty($validatedData['password'])) {
            $dataToUpdate['password'] = $validatedData['password']; // Model akan hash otomatis
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