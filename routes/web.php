<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluhKesahController;



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

Route::get('/pages/akademik/prestasi', function () {
    return view('pages.akademik.prestasi');
});

Route::get('/pages/akademik/ekstrakulikuler', function () {
    return view('pages.akademik.ekstrakulikuler');
});

Route::get('/pages/PPDB', function () {
    return view('pages.PPDB');
});

Route::get('/pages/berita', function () {
    return view('pages.berita');
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
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/user/siswa', [AuthController::class, 'siswaDashboard'])->name('dashboard.user.siswa');
    Route::get('/dashboard/admin/admin', [AuthController::class, 'adminDashboard'])->name('dashboard.admin.admin');
    Route::get('/dashboard/admin/CRUD_berita', [AuthController::class, 'crudberita'])->name('dashboard.admin.CRUD_berita');
    Route::get('/dashboard/admin/CRUD_ekstra', [AuthController::class, 'crudberita'])->name('dashboard.admin.CRUD_ekstra');
    Route::get('/dashboard/admin/CRUD_prestasi', [AuthController::class, 'crudberita'])->name('dashboard.admin.CRUD_prestasi');
});


// === KELUH KESAH ===

Route::middleware('auth')->post('/keluh-kesah', [KeluhKesahController::class, 'store']);


