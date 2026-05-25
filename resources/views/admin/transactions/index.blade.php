<x-admin-layout>
    <x-slot name="header">
        Manajemen Transaksi
    </x-slot>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    <div class="overflow-hidden bg-white border border-gray-100 rounded-2xl shadow-sm">
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 bg-white">
            <h3 class="text-lg font-bold text-gray-800">Daftar Transaksi / Setoran Nasabah</h3>
            
            <!-- Search Form -->
            <form action="{{ route('admin.index') }}" method="GET" class="w-full md:w-auto flex items-center gap-2">
                <div class="relative w-full md:w-80">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nasabah atau kategori..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-[#5C8D3A] focus:ring-2 focus:ring-[#5C8D3A]/20 transition-all outline-none">
                </div>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">ID</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Nasabah & Kontak</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Detail Sampah</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Pengiriman & Waktu</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Total Poin</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Status & Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($transactions as $transaction)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 whitespace-nowrap">
                                #TRX-{{ str_pad($transaction->id, 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900">{{ $transaction->user->name }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $transaction->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900">{{ $transaction->wasteCategory->name ?? 'Sampah' }}</div>
                                <div class="text-sm font-medium text-[#4A7F2F]">{{ $transaction->weight }} kg</div>
                                @if($transaction->waste_image)
                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $transaction->waste_image) }}" target="_blank" class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors bg-blue-50 px-2 py-1 rounded-md border border-blue-100">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        Lihat Foto
                                    </a>
                                </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-800">{{ $transaction->shipping_type }}</div>
                                @if($transaction->ecopoint_branch)
                                    <div class="text-xs text-gray-500 mt-1">{{ $transaction->ecopoint_branch }}</div>
                                @elseif($transaction->address)
                                    <div class="text-xs text-gray-500 mt-1 truncate max-w-[150px]" title="{{ $transaction->address }}">{{ rtrim(substr($transaction->address, 0, 20)) }}...</div>
                                @endif
                                <div class="text-xs text-gray-400 mt-1">{{ $transaction->created_at->format('d M Y, H:i') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-extrabold text-[#2C481A]">
                                {{ number_format($transaction->total_amount, 0, ',', '.') }} Poin
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($transaction->status === 'pending')
                                    <div class="flex gap-2">
                                        <form action="{{ route('admin.confirm', $transaction->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-3 py-1.5 text-xs font-bold text-white bg-[#5C8D3A] hover:bg-[#4A7F2F] rounded-lg transition-colors shadow-sm">
                                                Konfirmasi
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.reject', $transaction->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin MENOLAK setoran ini?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-3 py-1.5 text-xs font-bold text-white bg-red-500 hover:bg-red-600 rounded-lg transition-colors shadow-sm">
                                                Tolak
                                            </button>
                                        </form>
                                    </div>
                                @elseif($transaction->status === 'confirmed')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Selesai
                                    </span>
                                @elseif($transaction->status === 'rejected')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold text-red-700 bg-red-100 rounded-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        Ditolak
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                    <span class="text-sm font-medium">Belum ada transaksi setoran.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
            {{ $transactions->withQueryString()->links() }}
        </div>
    </div>
</x-admin-layout>
