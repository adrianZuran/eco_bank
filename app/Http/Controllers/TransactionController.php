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
        return view('deposit', compact('categories', 'history'));
    }

    // Proses simpan setoran
    public function store(Request $request) {
        $request->validate([
            'waste_category_id' => 'required',
            'weight' => 'required|numeric|min:0.1',
        ]);

        $category = WasteCategory::find($request->waste_category_id);
        $total_amount = $request->weight * $category->price_per_kg;

        Transaction::create([
            'user_id' => auth()->id(),
            'waste_category_id' => $request->waste_category_id,
            'weight' => $request->weight,
            'total_amount' => $total_amount,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Setoran berhasil! Tunggu verifikasi admin.');
    }
}
