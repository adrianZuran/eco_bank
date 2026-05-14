<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMissionController extends Controller
{
    public function store(Request $request, \App\Models\Mission $mission)
    {
        $user = auth()->user();
        
        // Cek apakah sudah pernah menyelesaikan misi ini
        $existing = \App\Models\UserMission::where('user_id', $user->id)
            ->where('mission_id', $mission->id)
            ->first();
            
        if ($existing) {
            return back()->with('error', 'Anda sudah mengambil misi ini.');
        }
        
        \App\Models\UserMission::create([
            'user_id' => $user->id,
            'mission_id' => $mission->id,
            'status' => 'pending'
        ]);
        
        return back()->with('success', 'Misi berhasil diklaim, menunggu verifikasi Admin.');
    }
}
