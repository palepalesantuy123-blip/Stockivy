<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationController;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

// Dashboard Utama
Route::get('/', function () {
    $items = Item::all();
    $totalProduct = Item::count();
    $totalCategory = Item::distinct()->count('category');

    $labels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $dataBawah = [0, 0, 0, 0, 0, 0, 0];
    $dataAtas = [0, 0, 0, 0, 0, 0, 0];

    $weeklyStats = Item::select(
        DB::raw("DAYNAME(created_at) as day_name"),
        DB::raw("SUM(min_quantity) as total_min"),
        DB::raw("SUM(max_quantity) as total_max")
    )
    ->where('created_at', '>=', Carbon::now()->subDays(7))
    ->groupBy('day_name')
    ->get();

    foreach ($weeklyStats as $stat) {
        $index = array_search($stat->day_name, $labels);
        if ($index !== false) {
            $dataBawah[$index] = (int) $stat->total_min;
            $dataAtas[$index] = (int) $stat->total_max;
        }
    }

    $storageStats = Item::select('category', DB::raw('SUM(min_quantity + max_quantity) as total_stock'))
    ->groupBy('category')
    ->get();

    $pieLabels = $storageStats->pluck('category')->toArray();
    $pieValues = $storageStats->pluck('total_stock')->toArray();

    return view('item.index', [
        'items' => $items,
        'totalProduct' => $totalProduct,
        'totalCategory' => $totalCategory,
        'person' => 'Stefanie Sun',
        'description' => '不晚',
        'user_profile' => 'blue.jpg',
        'labels' => $labels,
        'dataBawah' => $dataBawah,
        'dataAtas' => $dataAtas,
        'pieLabels' => $pieLabels,
        'pieValues' => $pieValues,
    ]);
});

// Category & Items Routing (Menggunakan CategoryController bawaan lu)
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/items/{item}/edit', [CategoryController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [CategoryController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [CategoryController::class, 'destroy'])->name('items.destroy');

Route::get('/add', function () {
    return view('item.add', [
        'date' => '2024-06-01',
        'time' => '14:30',
    ]);
});
Route::post('/item', [ItemController::class, 'store'])->name('items.store');

Route::get('/notification', [NotificationController::class, 'index'])->name('notifications.index');

Route::delete('/notification/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');


// Auth Middleware
Route::middleware('guest')->group(function () {
    Route::get('/login', [RegisteredController::class, 'create'])->name('login');
    Route::post('/login', [RegisteredController::class, 'store']);
    Route::get('/register', [RegisteredController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredController::class, 'store']);
});
