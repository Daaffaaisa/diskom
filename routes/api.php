<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk CRUD Berita
Route::resource('beritas', BeritaController::class)->except(['create', 'edit']);

// Route untuk CRUD Prestasi
Route::resource('prestasis', PrestasiController::class)->except(['create', 'edit']);

// Route untuk CRUD Ekstrakurikuler
Route::resource('ekstrakurikulers', EkstrakurikulerController::class)->except(['create', 'edit']);

// Route untuk CRUD User
Route::resource('users', UserController::class)->except(['create', 'edit']); // <--- TAMBAHKAN BARIS INI
