<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Menampilkan form tambah produk (GET /add)
     */
    public function create()
    {
        return view('item.add');
    }

    /**
     * Menyimpan data produk baru (POST /item)
     */
    public function store(Request $request)
    {
        // 1. Validasi Input ketat standar LKS
        $validatedData = $request->validate([
            'name'         => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'sub_category' => 'nullable|string|max:100',
            'min_quantity' => 'required|integer|min:0',
            'max_quantity' => 'nullable|integer|min:0',
            'weight'       => 'nullable|numeric',
            'weight_unit'  => 'nullable|string',
            'height'       => 'nullable|numeric',
            'height_unit'  => 'nullable|string',
            'length'       => 'nullable|numeric',
            'length_unit'  => 'nullable|string',
            'width'        => 'nullable|numeric',
            'width_unit'  => 'nullable|string',
            'images'       => 'nullable|array',
            'images.*'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // 2. Set Status (Draft vs Active/Publish)
        $status = $request->input('status') === 'draft' ? 'draft' : 'active';

        // 3. Handle Upload Gambar Tunggal/Multi dengan aman
        $imagePath = null;
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            if (isset($files[0]) && $files[0]->isValid()) {
                $path = $files[0]->store('products', 'public');
                $imagePath = 'storage/' . $path;
            }
        }

        // 4. Amankan Aturan Database: max_quantity tidak boleh null
        $minQty = (int) $validatedData['min_quantity'];
        $maxQty = $request->filled('max_quantity') ? (int) $request->input('max_quantity') : $minQty;

        // 5. Eksekusi Create Data Ke Database
        Item::create([
            'name'         => $validatedData['name'],
            'category'     => $validatedData['category'],
            'sub_category' => $validatedData['sub_category'] ?? null,
            'min_quantity' => $minQty,
            'max_quantity' => $maxQty,
            'weight'       => $validatedData['weight'] ?? null,
            'weight_unit'  => $validatedData['weight_unit'] ?? 'kg',
            'height'       => $validatedData['height'] ?? null,
            'height_unit'  => $validatedData['height_unit'] ?? 'in',
            'length'       => $validatedData['length'] ?? null,
            'length_unit'  => $validatedData['length_unit'] ?? 'in',
            'width'        => $validatedData['width'] ?? null,
            'width_unit'  => $validatedData['width_unit'] ?? 'in',
            'status'       => $status,
            'image'        => $imagePath,
        ]);

        return redirect()->route('category.index')->with('success', 'Product created successfully!');
    }
}
