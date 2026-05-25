<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Statistik Utama Dashboard
        $items = Item::all();
        $totalProduct = Item::count();
        $totalCategory = Item::distinct()->count('category');

        // 2. Logic Chart Batang (Weekly Stats)
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

        // 3. Logic Chart Lingkaran (Pie Storage Stats)
        $storageStats = Item::select('category', DB::raw('SUM(min_quantity + max_quantity) as total_stock'))
        ->groupBy('category')
        ->get();

        $pieLabels = $storageStats->pluck('category')->toArray();
        $pieValues = $storageStats->pluck('total_stock')->toArray();

        // 4. Filter Indikator Kritis (Pemisah Data Kiri & Kanan)
        // Restock Insight: Ambil yang batas minimum stock-nya kritis (<= 5 pcs)
        $restockItems = Item::where('min_quantity', '<=', 5)
                            ->orderBy('min_quantity', 'asc')
                            ->take(10)
                            ->get();

        // Recent Activity: Ambil data produk yang paling terakhir diperbarui/masuk ke sistem
        $recentActivities = Item::latest('updated_at')
                                ->take(8)
                                ->get();

        // 5. Return ke View dengan Data Lengkap
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
            'restockItems' => $restockItems,
            'recentActivities' => $recentActivities,
        ]);
    }
}
