<x-admin-layout>
    <x-slot name="header">
        Kelola Misi
    </x-slot>

    @if(session('success'))
        <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative shadow-sm" role="alert">
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-extrabold text-gray-800">Daftar Misi Aktif</h2>
        <a href="{{ route('admin.missions.create') }}" class="px-5 py-2.5 bg-[#5C8D3A] hover:bg-[#4A7F2F] text-white rounded-xl text-sm font-bold flex items-center gap-2 shadow-md transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Misi
        </a>
    </div>

    <!-- Missions Table -->
    <div class="overflow-hidden bg-white border border-gray-100 rounded-2xl shadow-sm">
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 bg-white">
            <h3 class="text-lg font-bold text-gray-800">Daftar Misi</h3>
            
            <!-- Search Form -->
            <form action="{{ route('admin.missions.index') }}" method="GET" class="w-full md:w-auto flex items-center gap-2">
                <div class="relative w-full md:w-80">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul misi..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-[#5C8D3A] focus:ring-2 focus:ring-[#5C8D3A]/20 transition-all outline-none">
                </div>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Judul Misi</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Deskripsi</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Hadiah Poin</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Status</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($missions as $item)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-bold text-gray-900">{{ $item->title }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ Str::limit($item->description, 50) }}
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-[#5C8D3A] whitespace-nowrap">
                                +{{ number_format($item->reward_points, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($item->is_active)
                                    <span class="px-3 py-1 text-xs font-semibold text-green-600 bg-green-50 rounded-full">Aktif</span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold text-gray-600 bg-gray-50 rounded-full">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.missions.edit', $item->id) }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">Edit</a>
                                    
                                    <form action="{{ route('admin.missions.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus misi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-semibold text-red-500 hover:text-red-700 transition-colors">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    <span class="text-sm font-medium">Belum ada misi. Mulai tambahkan sekarang!</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
            {{ $missions->withQueryString()->links() }}
        </div>
    </div>
</x-admin-layout>
