<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROUTE UNTUK NASABAH (USER BIASA)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    Route::get('/deposit', [TransactionController::class, 'index'])->name('deposit.index');
    Route::post('/deposit', [TransactionController::class, 'store'])->name('deposit.store');
});

// ROUTE KHUSUS ADMIN (PETUGAS BANK SAMPAH)
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/transactions', [AdminController::class, 'index'])->name('admin.index');
    Route::patch('/admin/transactions/{id}/confirm', [AdminController::class, 'confirm'])->name('admin.confirm');
});

require __DIR__.'/auth.php';
