<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;


// http://laravel10_perpustakaan.test => http://laravel10_perpustakaan.test/login 
Route::redirect('/', '/login');

// login, logout
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// My Profile
Route::get('/my-profile', [MyProfileController::class, 'index']);
Route::get('/my-profile/edit', [MyProfileController::class, 'edit']);
Route::put('/my-profile/{user}/upload', [MyProfileController::class, 'upload']);
Route::put('/my-profile/{user}/update', [MyProfileController::class, 'update']);

// Penerbit
Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::get('/penerbit/create', [PenerbitController::class, 'create']);
Route::post('/penerbit/store', [PenerbitController::class, 'store']);
Route::get('/penerbit/{penerbit}/edit', [PenerbitController::class, 'edit']);
Route::put('/penerbit/{penerbit}/update', [PenerbitController::class, 'update']);
Route::delete('/penerbit/{penerbit}', [PenerbitController::class, 'destroy']);

// Buku
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/create', [BukuController::class, 'create']);
Route::post('/buku/store', [BukuController::class, 'store']);
Route::get('/buku/{buku}/edit', [BukuController::class, 'edit']);
Route::put('/buku/{buku}/update', [BukuController::class, 'update']);
Route::delete('/buku/{buku}', [BukuController::class, 'destroy']);

// Pengguna
Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::get('/pengguna/create', [PenggunaController::class, 'create']);
Route::post('/pengguna/store', [PenggunaController::class, 'store']);
Route::get('/pengguna/{user}/edit', [PenggunaController::class, 'edit']);
Route::put('/pengguna/{user}/update', [PenggunaController::class, 'update']);
Route::delete('/pengguna/{user}', [PenggunaController::class, 'destroy']);

// Pengajuan
Route::get('/pengajuan', [TransaksiController::class, 'pengajuan']);
Route::get('/pengajuan/create', [TransaksiController::class, 'create']);
Route::post('/pengajuan/store', [TransaksiController::class, 'store']);
Route::put('/pengajuan/{transaksi}/batal', [TransaksiController::class, 'batal']);
Route::put('/pengajuan/{transaksi}/update', [TransaksiController::class, 'update']);

// Peminjaman
Route::get('/peminjaman', [TransaksiController::class, 'peminjaman']);
Route::put('/peminjaman/{transaksi}/update', [TransaksiController::class, 'update']);

// Pengembalian
Route::get('/pengembalian', [TransaksiController::class, 'pengembalian']);
