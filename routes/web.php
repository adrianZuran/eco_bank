<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PointExchangeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/beranda', function () {
    return view('user.beranda');
})->name('home');

Route::get('/kontak', function () {
    return view('user.contact');
})->name('contact');

Route::get('/katalog', function () {
    $categories = \App\Models\WasteCategory::orderBy('category')->orderBy('name')->get()->groupBy('category');
    return view('user.catalog', compact('categories'));
})->name('catalog');

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
        $user = auth()->user();
        $transactions = $user->transactions()->with('wasteCategory')->latest()->get();
        
        $totalWeight = $transactions->where('status', 'confirmed')->sum('weight');
        $totalTransactions = $transactions->count();
        $recentTransactions = $transactions->take(3);
        
        $treesSaved = $totalWeight * 0.5;
        $co2Saved = $totalWeight * 1.2;
        $ecoPoints = floor($user->balance / 100);

        $activeMissions = \App\Models\Mission::where('is_active', true)->get();
        $userMissions = \App\Models\UserMission::where('user_id', $user->id)->get()->keyBy('mission_id');

        return view('user.dashboard', compact('totalWeight', 'totalTransactions', 'treesSaved', 'co2Saved', 'ecoPoints', 'recentTransactions', 'activeMissions', 'userMissions'));
    })->name('user.dashboard');
    Route::get('/deposit', [TransactionController::class, 'index'])->name('deposit.index');
    Route::post('/deposit', [TransactionController::class, 'store'])->name('deposit.store');
    Route::post('/exchange', [PointExchangeController::class, 'store'])->name('exchange.store');
    Route::post('/missions/{mission}/complete', [\App\Http\Controllers\UserMissionController::class, 'store'])->name('user.missions.complete');
});

// ROUTE KHUSUS ADMIN (PETUGAS BANK SAMPAH)
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::resource('admin/catalog', CatalogController::class)->names([
        'index' => 'admin.catalog.index',
        'create' => 'admin.catalog.create',
        'store' => 'admin.catalog.store',
        'edit' => 'admin.catalog.edit',
        'update' => 'admin.catalog.update',
        'destroy' => 'admin.catalog.destroy',
    ]);

    Route::get('/admin/transactions', [AdminController::class, 'index'])->name('admin.index');
    Route::patch('/admin/transactions/{id}/confirm', [AdminController::class, 'confirm'])->name('admin.confirm');
    Route::patch('/admin/transactions/{id}/reject', [AdminController::class, 'rejectTransaction'])->name('admin.reject');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    
    Route::get('/admin/exchanges', [AdminController::class, 'exchanges'])->name('admin.exchanges.index');
    Route::patch('/admin/exchanges/{id}/approve', [AdminController::class, 'approveExchange'])->name('admin.exchanges.approve');
    Route::patch('/admin/exchanges/{id}/reject', [AdminController::class, 'rejectExchange'])->name('admin.exchanges.reject');
    
    Route::resource('admin/missions', \App\Http\Controllers\Admin\MissionController::class)->names([
        'index' => 'admin.missions.index',
        'create' => 'admin.missions.create',
        'store' => 'admin.missions.store',
        'edit' => 'admin.missions.edit',
        'update' => 'admin.missions.update',
        'destroy' => 'admin.missions.destroy',
    ]);
    Route::get('/admin/user-missions', [\App\Http\Controllers\Admin\MissionController::class, 'userMissions'])->name('admin.user-missions.index');
    Route::patch('/admin/user-missions/{userMission}/approve', [\App\Http\Controllers\Admin\MissionController::class, 'approveUserMission'])->name('admin.user-missions.approve');
    Route::patch('/admin/user-missions/{userMission}/reject', [\App\Http\Controllers\Admin\MissionController::class, 'rejectUserMission'])->name('admin.user-missions.reject');
});

require __DIR__.'/auth.php';
