<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function confirm($id) {
    $transaction = Transaction::findOrFail($id);
    $transaction->update(['status' => 'confirmed']);

    return back()->with('success', 'Transaksi berhasil diverifikasi! Saldo nasabah bertambah.');
}
}
