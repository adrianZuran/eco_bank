<x-admin-layout>
    <x-slot name="header">
        Verifikasi Misi Nasabah
    </x-slot>

    @if(session('success'))
        <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative shadow-sm" role="alert">
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative shadow-sm" role="alert">
            <span class="block sm:inline font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <h2 class="text-2xl font-extrabold text-gray-800">Daftar Misi Menunggu Verifikasi</h2>
        
        <!-- Search Form -->
        <form action="{{ route('admin.user-missions.index') }}" method="GET" class="w-full md:w-auto flex items-center gap-2">
            <div class="relative w-full md:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nasabah atau misi..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-[#5C8D3A] focus:ring-2 focus:ring-[#5C8D3A]/20 transition-all outline-none shadow-sm">
            </div>
        </form>
    </div>

    <!-- User Missions Table -->
    <div class="overflow-hidden bg-white border border-gray-100 rounded-2xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Nasabah</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Misi</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Waktu Klaim</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Status</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($userMissions as $item)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">
                                        {{ substr($item->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900">{{ $item->user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $item->user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-sm font-bold text-gray-900">{{ $item->mission->title }}</p>
                                <p class="text-xs text-[#5C8D3A] font-bold">+{{ number_format($item->mission->reward_points, 0, ',', '.') }} Poin</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($item->status === 'pending')
                                    <span class="px-3 py-1 text-xs font-semibold text-yellow-600 bg-yellow-50 rounded-full border border-yellow-200">Menunggu Verifikasi</span>
                                @elseif($item->status === 'completed')
                                    <span class="px-3 py-1 text-xs font-semibold text-green-600 bg-green-50 rounded-full border border-green-200">Selesai</span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold text-red-600 bg-red-50 rounded-full border border-red-200">Ditolak</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                @if($item->status === 'pending')
                                    <div class="flex items-center justify-end gap-2">
                                        <form action="{{ route('admin.user-missions.approve', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white rounded-lg text-xs font-bold transition-colors">Setujui</button>
                                        </form>
                                        <form action="{{ route('admin.user-missions.reject', $item->id) }}" method="POST" onsubmit="return confirm('Tolak misi ini?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-3 py-1.5 bg-white border border-red-200 text-red-600 hover:bg-red-50 rounded-lg text-xs font-bold transition-colors">Tolak</button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span class="text-sm font-medium">Belum ada misi yang diajukan nasabah.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
            {{ $userMissions->withQueryString()->links() }}
        </div>
    </div>
</x-admin-layout>
