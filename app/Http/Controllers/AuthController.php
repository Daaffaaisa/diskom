<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role == 'admin') {
                return response()->json(['redirect' => route('pages.beranda')]);
            } else {
                return response()->json(['redirect' => route('pages.beranda')]);
            }
        }

        return response()->json(['error' => 'Login gagal!'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function siswaDashboard()
    {
        return view('dashboard.user.siswa');
    }

    public function adminDashboard()
    {
        return view('dashboard.admin.admin');
    }

        public function crudberita()
    {
        return view('dashboard.admin.CRUD_berita');
    }

        public function crudekstra()
    {
        return view('dashboard.admin.CRUD_ekstra');
    }

        public function crudprestasi()
    {
        return view('dashboard.admin.CRUD_prestasi');
    }
}