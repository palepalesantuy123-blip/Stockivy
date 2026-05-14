<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockivyController;
use App\Http\Controllers\RegisteredController;

Route::get('/', function () {
    return view('item.index');
});

//Login, etc.
Route::middleware('guest')->group(function () {
    Route::get('/login', [RegisteredController::class, 'create'])->name('login');
    Route::post('/login', [RegisteredController::class, 'store']);
    Route::get('/register', [RegisteredController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredController::class, 'store']);
});
