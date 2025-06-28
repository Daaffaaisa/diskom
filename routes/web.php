<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluhKesahController;
use App\Http\Controllers\BeritaPublicController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PrestasiPublicController;



// === BERANDA UTAMA ===
Route::get('/', function () {
    return view('pages.beranda');
})->name('pages.beranda');

// === HALAMAN LAIN ===
Route::get('/pages/beranda', function () {
    return view('pages.beranda');
});

Route::get('/pages/profile', function () {
    return view('pages.profile');
});

Route::get('/pages/berita', [BeritaPublicController::class, 'index'])->name('pages.berita.public.index');

Route::get('/pages/akademik/prestasi', [PrestasiPublicController::class, 'index'])->name('prestasi.public.index');

Route::resource('ekstrakurikulers', EkstrakurikulerController::class)->except(['create', 'edit']); // <--- TAMBAHKAN BARIS INI

Route::get('/pages/akademik/prestasi/{year}', [PrestasiPublicController::class, 'showByYear'])->name('prestasi.public.show-by-year');


Route::get('/pages/akademik/ekstrakulikuler', function () {
    return view('pages.akademik.ekstrakulikuler');
});

Route::get('/pages/PPDB', function () {
    return view('pages.PPDB');
});


Route::get('/dashboard/kalender', function () {
    return view('dashboard.user.kalender');
});

Route::get('/dashboard/admin/CRUD_berita', function () {
    return view('dashboard.admin.CRUD_berita');
});


// === HALAMAN PRESTASI PER TAHUN ===
$years = ['2017', '2018', '2019', '2020', '2021', '2022', '2024'];
foreach ($years as $year) {
    Route::get("/pages/akademik/prestasi/{$year}", function () use ($year) {
        return view("pages.akademik.prestasi.{$year}");
    });
}

// === AUTENTIKASI DAN DASHBOARD ===

// Ini adalah route untuk menangani jika ada yang mencoba GET /login
// Kita arahkan ke halaman beranda karena modal login sudah ada di sana.
// Kita tidak akan memberi nama 'login' pada route GET ini untuk menghindari konflik
// dengan internal Laravel yang mungkin masih mencari 'login' untuk menampilkan form.
Route::get('/login', function () {
    return redirect('/');
})->name('login');

// Ini adalah route untuk memproses submit form login dari modal (POST request)
// Kita beri nama yang jelas dan berbeda dari 'login' default Laravel.
Route::post('/do-login', [AuthController::class, 'login'])->name('do.login'); // Ubah URL dan nama route POST login

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/user/siswa', [AuthController::class, 'siswaDashboard'])->name('dashboard.user.siswa');
    Route::get('/dashboard/admin/admin', [AuthController::class, 'adminDashboard'])->name('dashboard.admin.admin');
    Route::get('/dashboard/admin/CRUD_berita', [AuthController::class, 'crudberita'])->name('dashboard.admin.CRUD_berita');
    Route::get('/dashboard/admin/CRUD_ekstra', [AuthController::class, 'crudekstra'])->name('dashboard.admin.CRUD_ekstra');
    Route::get('/dashboard/admin/CRUD_prestasi', [AuthController::class, 'crudprestasi'])->name('dashboard.admin.CRUD_prestasi');
});

// === KELUH KESAH ===

Route::middleware('auth')->post('/keluh-kesah', [KeluhKesahController::class, 'store']);


// === BERITA DINAMIS ===


// ... (rute-rute dashboard admin di bawahnya, seperti ini) ...

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/berita', function () {
        return view('admin.berita');
    })->name('admin.berita');

    // ... (rute-rute lain untuk admin) ...
});


