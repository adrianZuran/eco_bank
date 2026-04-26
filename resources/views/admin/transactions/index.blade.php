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
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-white">
            <h3 class="text-lg font-bold text-gray-800">Daftar Transaksi / Setoran Nasabah</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">ID</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Nasabah & Kontak</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Detail Sampah</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Pengiriman & Waktu</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Total (Rp)</th>
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
                                <span class="px-3 py-1 text-xs font-medium text-[#4A7F2F] bg-[#F2F7EF] border border-[#BDE8A5] rounded-full">
                                    {{ $transaction->wasteCategory->name }}
                                </span>
                                <div class="text-sm text-gray-600 mt-2 font-medium">{{ $transaction->weight }} Kg</div>
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
                                Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($transaction->status === 'pending')
                                    <form action="{{ route('admin.confirm', $transaction->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Verifikasi transaksi ini dan tambahkan saldo ke nasabah?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-4 py-2 text-xs font-bold text-white bg-[#EAB308] hover:bg-[#CA8A04] rounded-lg transition-colors shadow-sm">
                                            Konfirmasi / Pending
                                        </button>
                                    </form>
                                @elseif($transaction->status === 'confirmed')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Selesai
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold text-red-700 bg-red-100 rounded-lg">
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
    </div>
</x-admin-layout>
