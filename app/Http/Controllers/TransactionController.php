<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\WasteCategory;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Menampilkan halaman setoran
    public function index() {
        $categories = WasteCategory::all();
        $history = Transaction::where('user_id', auth()->id())->latest()->get();
        return view('user.deposit', compact('categories', 'history'));
    }

    // Proses simpan setoran
    public function store(Request $request) {
        $request->validate([
            'waste_category_id' => 'required',
            'weight' => 'required|numeric|min:0.1',
            'waste_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $category = WasteCategory::find($request->waste_category_id);
        $total_amount = $request->weight * $category->price_per_kg;

        $imagePath = null;
        if ($request->hasFile('waste_image')) {
            $imagePath = $request->file('waste_image')->store('waste_images', 'public');
        }

        Transaction::create([
            'user_id' => auth()->id(),
            'waste_category_id' => $request->waste_category_id,
            'weight' => $request->weight,
            'total_amount' => $total_amount,
            'status' => 'pending',
            'shipping_type' => $request->shipping_type ?? 'Antar Sendiri ke EcoPoint',
            'address' => $request->address,
            'ecopoint_branch' => $request->ecopoint_branch,
            'pickup_date' => $request->pickup_date,
            'notes' => $request->notes,
            'waste_image' => $imagePath,
        ]);

        return back()->with('success', 'Setoran berhasil! Tunggu verifikasi admin.');
    }
}
