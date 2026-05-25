<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryFilter = $request->input('category');
        $startDate = $request->input('start_date');
        $startTime = $request->input('start_time');
        $endDate = $request->input('end_date');
        $endTime = $request->input('end_time');

        $query = Item::latest();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($categoryFilter) {
            $query->where('category', $categoryFilter);
        }

        if ($startDate) {
            $fullStartTime = $startTime ?? '00:00:00';
            $query->where('created_at', '>=', Carbon::parse($startDate . ' ' . $fullStartTime));
        }

        if ($endDate) {
            $fullEndTime = $endTime ?? '23:59:59';
            $query->where('created_at', '<=', Carbon::parse($endDate . ' ' . $fullEndTime));
        }

        $items = $query->get();

        // --- PERBAIKAN PENGAMBILAN GAMBAR DETAIL ---
        $selectedItem = Item::find($request->query('selected_id'));

        if ($selectedItem) {
            // 1. Jika di DB namanya kolom 'images' (cast array/JSON) tapi di blade manggil 'image'
            if (isset($selectedItem->images) && is_array($selectedItem->images) && count($selectedItem->images) > 0) {
                $selectedItem->image = $selectedItem->images[0];
            } elseif (is_string($selectedItem->image) && str_starts_with($selectedItem->image, '[')) {
                $decoded = json_decode($selectedItem->image, true);
                $selectedItem->image = $decoded[0] ?? null;
            }

            if ($selectedItem->image) {
                $cleanPath = str_replace('\\', '/', $selectedItem->image);
                if (!str_starts_with($cleanPath, 'storage/')) {
                    $cleanPath = 'storage/' . ltrim($cleanPath, '/');
                }
                $selectedItem->image = $cleanPath;
            }
        }

        $totalCategories = Item::distinct('category')->count('category');
        $totalProducts = Item::count();

        return view('item.category', compact('items', 'selectedItem', 'totalCategories', 'totalProducts'));
    }

    public function edit(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'min_quantity' => 'required|numeric',
        ]);

        $dataToUpdate = $request->all();
        $dataToUpdate['status'] = $request->input('status') === 'draft' ? 'draft' : 'active';

        $item->update($dataToUpdate);

        return redirect()->route('category.index', ['selected_id' => $item->id])->with('success', 'Updated!');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('category.index')->with('success', 'Product deleted successfully!');
    }
}
