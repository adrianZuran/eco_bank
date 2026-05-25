<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WasteCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = WasteCategory::when($request->search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('category', 'like', "%{$search}%");
            })
            ->orderBy('category')
            ->orderBy('name')
            ->paginate(5);
            
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = ['Plastik', 'Kertas', 'Logam', 'Kaca', 'Elektronik', 'Tekstil'];
        $trends = ['naik' => 'Naik', 'turun' => 'Turun', 'stabil' => 'Stabil'];
        return view('admin.categories.form', compact('categories', 'trends'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'sub_category' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|integer|min:0',
            'trend' => 'required|in:naik,turun,stabil',
            'trend_amount' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('catalog_images', 'public');
        }

        WasteCategory::create($validated);

        return redirect()->route('admin.catalog.index')->with('success', 'Produk sampah berhasil ditambahkan.');
    }

    public function edit(WasteCategory $catalog)
    {
        $product = $catalog; // for semantics in form
        $categories = ['Plastik', 'Kertas', 'Logam', 'Kaca', 'Elektronik', 'Tekstil'];
        $trends = ['naik' => 'Naik', 'turun' => 'Turun', 'stabil' => 'Stabil'];
        return view('admin.categories.form', compact('product', 'categories', 'trends'));
    }

    public function update(Request $request, WasteCategory $catalog)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'sub_category' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|integer|min:0',
            'trend' => 'required|in:naik,turun,stabil',
            'trend_amount' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($catalog->image) {
                Storage::disk('public')->delete($catalog->image);
            }
            $validated['image'] = $request->file('image')->store('catalog_images', 'public');
        }

        $catalog->update($validated);

        return redirect()->route('admin.catalog.index')->with('success', 'Produk sampah berhasil diperbarui.');
    }

    public function destroy(WasteCategory $catalog)
    {
        if ($catalog->image) {
            Storage::disk('public')->delete($catalog->image);
        }
        $catalog->delete();
        return redirect()->route('admin.catalog.index')->with('success', 'Produk sampah berhasil dihapus.');
    }
}
