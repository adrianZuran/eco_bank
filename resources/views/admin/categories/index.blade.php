<x-admin-layout>
    <x-slot name="header">
        Katalog Harga Sampah
    </x-slot>

    @if(session('success'))
        <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative shadow-sm" role="alert">
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-extrabold text-gray-800">Daftar Harga Produk</h2>
        <a href="{{ route('admin.catalog.create') }}" class="px-5 py-2.5 bg-[#5C8D3A] hover:bg-[#4A7F2F] text-white rounded-xl text-sm font-bold flex items-center gap-2 shadow-md transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Produk
        </a>
    </div>

    <!-- Products Table -->
    <div class="overflow-hidden bg-white border border-gray-100 rounded-2xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Kategori</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Nama Produk</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Harga / Kg</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Trend</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($categories as $item)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-50 rounded-full">{{ $item->category }}</span>
                                @if($item->sub_category)
                                    <span class="text-xs text-gray-400 ml-2 font-medium">{{ $item->sub_category }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-bold text-gray-900 group-hover:text-[#5C8D3A] transition-colors">{{ $item->name }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-[#5C8D3A] whitespace-nowrap">
                                Rp {{ number_format($item->price_per_kg, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($item->trend === 'naik')
                                    <span class="text-xs font-bold text-[#5C8D3A] flex items-center gap-1">▲ {{ $item->trend_amount }}</span>
                                @elseif($item->trend === 'turun')
                                    <span class="text-xs font-bold text-red-500 flex items-center gap-1">▼ {{ $item->trend_amount }}</span>
                                @else
                                    <span class="text-xs font-bold text-gray-500 flex items-center gap-1">- Stabil</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.catalog.edit', $item->id) }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">Edit</a>
                                    
                                    <form action="{{ route('admin.catalog.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
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
                                    <span class="text-sm font-medium">Belum ada produk di katalog. Mulai tambahkan sekarang!</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
