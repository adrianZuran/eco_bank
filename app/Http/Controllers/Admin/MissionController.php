<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index(Request $request)
    {
        $missions = \App\Models\Mission::when($request->search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5);
            
        return view('admin.missions.index', compact('missions'));
    }

    public function create()
    {
        return view('admin.missions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reward_points' => 'required|integer|min:0',
        ]);

        \App\Models\Mission::create([
            'title' => $request->title,
            'description' => $request->description,
            'reward_points' => $request->reward_points,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.missions.index')->with('success', 'Misi berhasil ditambahkan.');
    }

    public function edit(\App\Models\Mission $mission)
    {
        return view('admin.missions.edit', compact('mission'));
    }

    public function update(Request $request, \App\Models\Mission $mission)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reward_points' => 'required|integer|min:0',
        ]);

        $mission->update([
            'title' => $request->title,
            'description' => $request->description,
            'reward_points' => $request->reward_points,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.missions.index')->with('success', 'Misi berhasil diperbarui.');
    }

    public function destroy(\App\Models\Mission $mission)
    {
        $mission->delete();
        return redirect()->route('admin.missions.index')->with('success', 'Misi berhasil dihapus.');
    }

    public function userMissions(Request $request)
    {
        $userMissions = \App\Models\UserMission::with(['user', 'mission'])
            ->when($request->search, function ($query, $search) {
                return $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('mission', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
            })
            ->orderByRaw("FIELD(status, 'pending') DESC")
            ->latest()
            ->paginate(5);
            
        return view('admin.missions.monitoring', compact('userMissions'));
    }

    public function approveUserMission(\App\Models\UserMission $userMission)
    {
        if ($userMission->status === 'pending') {
            $userMission->update([
                'status' => 'completed',
                'completed_at' => now(),
            ]);

            $userMission->user->increment('balance', $userMission->mission->reward_points);

            return back()->with('success', 'Misi disetujui, poin telah ditambahkan ke saldo nasabah.');
        }

        return back()->with('error', 'Misi sudah diverifikasi sebelumnya.');
    }

    public function rejectUserMission(\App\Models\UserMission $userMission)
    {
        if ($userMission->status === 'pending') {
            $userMission->update([
                'status' => 'rejected',
                'completed_at' => now(),
            ]);

            return back()->with('success', 'Misi ditolak.');
        }

        return back()->with('error', 'Misi sudah diverifikasi sebelumnya.');
    }
}
