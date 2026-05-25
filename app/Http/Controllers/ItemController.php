<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Menampilkan halaman Form Tambah Produk (GET /add)
     */
    public function create()
    {
        $items = Item::all();

        return view('item.add', [
            'items' => $items,
            'date'  => '2024-06-01',
            'time'  => '14:30',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'sub_category' => 'nullable|string',
            'min_quantity' => 'required|integer|min:0',
            'max_quantity' => 'nullable|integer|gte:min_quantity',
            'weight' => 'nullable|numeric',
            'weight_unit' => 'nullable|string',
            'height' => 'nullable|numeric',
            'height_unit' => 'nullable|string',
            'length' => 'nullable|numeric',
            'length_unit' => 'nullable|string',
            'width' => 'nullable|numeric',
            'width_unit' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $status = $request->input('status') === 'draft' ? 'draft' : 'active';

        $imagePath = null;
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            if (isset($files[0]) && $files[0]->isValid()) {
                $path = $files[0]->store('products', 'public');
                $imagePath = 'storage/' . $path;
            }
        }

        Item::create([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'sub_category' => $validatedData['sub_category'] ?? null,
            'min_quantity' => $validatedData['min_quantity'],
            'max_quantity' => $validatedData['max_quantity'] ?? null,
            'weight' => $validatedData['weight'] ?? null,
            'weight_unit' => $validatedData['weight_unit'] ?? 'KG',
            'height' => $validatedData['height'] ?? null,
            'height_unit' => $validatedData['height_unit'] ?? 'In',
            'length' => $validatedData['length'] ?? null,
            'length_unit' => $validatedData['length_unit'] ?? 'In',
            'width' => $validatedData['width'] ?? null,
            'width_unit' => $validatedData['width_unit'] ?? 'In',
            'status' => $status,
            'image' => $imagePath,
        ]);

        return redirect('/category')->with('success', 'Product added successfully!');
    }
}
