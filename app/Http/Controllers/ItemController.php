<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'sub_category' => 'nullable|string',
            'min_quantity' => 'required|integer|min:0',
            'max_quantity' => 'required|integer|gte:min_quantity',
            'weight' => 'nullable|numeric',
            'weight_unit' => 'nullable|string',
            'height' => 'nullable|numeric',
            'height_unit' => 'nullable|string',
            'length' => 'nullable|numeric',
            'length_unit' => 'nullable|string',
            'width' => 'nullable|numeric',
            'width_unit' => 'nullable|string',
            'status' => 'required|string', // Menangkap isi tombol draft / publish
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
            }
        }

        Item::create([
            'name' => $request->name,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'min_quantity' => $request->min_quantity,
            'max_quantity' => $request->max_quantity,
            'weight' => $request->weight,
            'weight_unit' => $request->weight_unit,
            'height' => $request->height,
            'height_unit' => $request->height_unit,
            'length' => $request->length,
            'length_unit' => $request->length_unit,
            'width' => $request->width,
            'width_unit' => $request->width_unit,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }
}
