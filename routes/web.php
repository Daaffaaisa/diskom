<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluhKesahController;
use App\Http\Controllers\BeritaPublicController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PrestasiPublicController;
use App\Http\Controllers\EkstrakurikulerPublicController;
use App\Http\Controllers\HomeController;

// === BERANDA UTAMA ===
Route::get('/', [HomeController::class, 'index'])->name('pages.beranda');   


// === HALAMAN LAIN ===

Route::get('/pages/profile', function () {
    return view('pages.profile');
});

Route::get('/pages/berita', [BeritaPublicController::class, 'index'])->name('pages.berita.public.index');

Route::get('/pages/akademik/prestasi', [PrestasiPublicController::class, 'index'])->name('prestasi.public.index');

Route::get('/pages/akademik/ekstrakulikuler', [EkstrakurikulerPublicController::class, 'index'])->name('ekstrakurikuler.public.index');

Route::get('/pages/akademik/prestasi/{year}', [PrestasiPublicController::class, 'showByYear'])->name('prestasi.public.show-by-year');


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
});

// === KELUH KESAH ===

Route::middleware('auth')->post('/keluh-kesah', [KeluhKesahController::class, 'store']);


// === BERITA DINAMIS ===

Route::resource('ekstrakurikuler', EkstrakurikulerController::class)->except(['create', 'edit']);


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