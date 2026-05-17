<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockivyController;
use App\Http\Controllers\RegisteredController;

Route::get('/', function () {
    $labels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $dataBawah = [120, 100, 140, 105, 112, 120, 100];
    $dataAtas = [44, 78, 68, 49, 55, 44, 81];
    return view('item.index', [
        'person' => 'Stefanie Sun',
        //        'person' => Auth::user()->name ?? 'Guest',
        'desciption' => 'afterwards',
        'user_profile' => 'bukankahini.jpg',
        'labels' => $labels,
        'dataBawah' => $dataBawah,
        'dataAtas' => $dataAtas,
    ]);
});

//Login, etc.
Route::middleware('guest')->group(function () {
    Route::get('/login', [RegisteredController::class, 'create'])->name('login');
    Route::post('/login', [RegisteredController::class, 'store']);
    Route::get('/register', [RegisteredController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredController::class, 'store']);
});
