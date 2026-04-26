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
        $transaction = \App\Models\Transaction::with('user')->findOrFail($id);
        
        if ($transaction->status === 'pending') {
            $transaction->update(['status' => 'confirmed']);
            
            // Tambahkan saldo ke user
            $user = $transaction->user;
            $user->balance += $transaction->total_amount;
            $user->save();

            return back()->with('success', 'Transaksi berhasil diverifikasi! Saldo nasabah bertambah Rp ' . number_format($transaction->total_amount, 0, ',', '.'));
        }

        return back()->with('error', 'Transaksi sudah diproses sebelumnya.');
    }

    public function storeUser(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);
        
        $user->role = 'user';
        $user->save();

        return back()->with('success', 'Nasabah baru berhasil didaftarkan!');
    }
}
