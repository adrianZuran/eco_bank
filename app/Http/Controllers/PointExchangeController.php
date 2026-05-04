<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointExchange;

class PointExchangeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'reward_type' => 'required|in:uang,pulsa',
            'points_deducted' => 'required|integer|min:1000',
            'account_info' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        if ($user->balance < $request->points_deducted) {
            return back()->with('error', 'Poin tidak mencukupi untuk melakukan penukaran.');
        }

        // Kurangi poin
        $user->balance -= $request->points_deducted;
        $user->save();

        PointExchange::create([
            'user_id' => $user->id,
            'reward_type' => $request->reward_type,
            'points_deducted' => $request->points_deducted,
            'account_info' => $request->account_info,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Permintaan tukar poin berhasil dibuat! Silakan tunggu konfirmasi admin.');
    }
}
