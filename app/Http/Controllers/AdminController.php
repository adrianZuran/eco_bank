<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request) {
        $users = \App\Models\User::where('role', 'user')
            ->when($request->search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5);
            
        $totalTransactions = \App\Models\Transaction::count();
        $totalWeight = \App\Models\Transaction::sum('weight');
        $pendingExchanges = \App\Models\PointExchange::where('status', 'pending')->count();
        
        return view('admin.dashboard', compact('users', 'totalTransactions', 'totalWeight', 'pendingExchanges'));
    }

    public function index(Request $request) {
        $transactions = \App\Models\Transaction::with('user', 'wasteCategory')
            ->when($request->search, function ($query, $search) {
                return $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('wasteCategory', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(5);
            
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

            return back()->with('success', 'Transaksi berhasil diverifikasi! Poin nasabah bertambah ' . number_format($transaction->total_amount, 0, ',', '.') . ' Poin.');
        }

        return back()->with('error', 'Transaksi sudah diproses sebelumnya.');
    }

    public function rejectTransaction($id) {
        $transaction = \App\Models\Transaction::findOrFail($id);
        
        if ($transaction->status === 'pending') {
            $transaction->update(['status' => 'rejected']);
            return back()->with('success', 'Transaksi berhasil ditolak.');
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

    public function exchanges(Request $request) {
        $exchanges = \App\Models\PointExchange::with('user')
            ->when($request->search, function ($query, $search) {
                return $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(5);
            
        return view('admin.exchanges.index', compact('exchanges'));
    }

    public function approveExchange($id) {
        $exchange = \App\Models\PointExchange::findOrFail($id);
        if ($exchange->status === 'pending') {
            $exchange->update(['status' => 'approved']);
            return back()->with('success', 'Penukaran poin berhasil disetujui.');
        }
        return back()->with('error', 'Status penukaran tidak dapat diubah.');
    }

    public function rejectExchange($id) {
        $exchange = \App\Models\PointExchange::findOrFail($id);
        if ($exchange->status === 'pending') {
            $exchange->update(['status' => 'rejected']);
            
            // Kembalikan poin ke user
            $user = $exchange->user;
            $user->balance += $exchange->points_deducted;
            $user->save();

            return back()->with('success', 'Penukaran poin ditolak. Poin telah dikembalikan ke nasabah.');
        }
        return back()->with('error', 'Status penukaran tidak dapat diubah.');
    }
}
