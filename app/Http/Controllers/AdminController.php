<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $users = \App\Models\User::where('role', 'user')->latest()->get();
        $totalTransactions = \App\Models\Transaction::count();
        $totalWeight = \App\Models\Transaction::sum('weight');
        
        return view('admin.dashboard', compact('users', 'totalTransactions', 'totalWeight'));
    }

    public function index() {
        $transactions = \App\Models\Transaction::with('user', 'wasteCategory')->latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function confirm($id) {
    $transaction = \App\Models\Transaction::findOrFail($id);
    $transaction->update(['status' => 'confirmed']);

    return back()->with('success', 'Transaksi berhasil diverifikasi! Saldo nasabah bertambah.');
}
}
