<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;

// --- AREA UNTUK USER YANG BELUM LOGIN ---
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [RegisteredController::class, 'store'])->name('login.perform');
});

// --- AREA UNTUK USER YANG SUDAH LOGIN (AUTH) ---
Route::middleware('auth')->group(function () {

    // Halaman Dashboard Utama
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Kategori / Produk (Sisi Kiri & Detail Kanan)
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/items/{item}/edit', [CategoryController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [CategoryController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [CategoryController::class, 'destroy'])->name('items.destroy');

    // Tambah Produk Baru
    Route::get('/add', [ItemController::class, 'create'])->name('items.add');
    Route::post('/item', [ItemController::class, 'store'])->name('items.store');

    // Notifikasi
    Route::get('/notification', [NotificationController::class, 'index'])->name('notifications.index');
    Route::delete('/notification/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    // Autentikasi Keluar
    Route::post('/logout', [RegisteredController::class, 'destroy'])->name('logout');

}); // <- Penutup group auth yang tadinya bikin unmatched sudah lurus di sini
