<x-admin-layout>
    <x-slot name="header">
        Penukaran Poin Nasabah
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
            <h3 class="text-lg font-bold text-gray-800">Daftar Antrean Penukaran Poin</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">ID</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Nasabah</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Penukaran</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Nomor / Rekening</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Jumlah Poin</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Waktu</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Status & Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($exchanges as $exchange)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 whitespace-nowrap">
                                #EXC-{{ str_pad($exchange->id, 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900">{{ $exchange->user->name }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $exchange->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($exchange->reward_type === 'uang')
                                    <span class="px-3 py-1 text-xs font-medium text-[#0ea5e9] bg-[#e0f2fe] border border-[#bae6fd] rounded-full uppercase">
                                        {{ $exchange->reward_type }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-medium text-[#d946ef] bg-[#fae8ff] border border-[#f5d0fe] rounded-full uppercase">
                                        {{ $exchange->reward_type }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-800">{{ $exchange->account_info }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-extrabold text-[#2C481A]">
                                {{ number_format($exchange->points_deducted, 0, ',', '.') }} Poin
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-xs text-gray-500">{{ $exchange->created_at->format('d M Y, H:i') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($exchange->status === 'pending')
                                    <div class="flex gap-2">
                                        <form action="{{ route('admin.exchanges.approve', $exchange->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin MENYETUJUI penukaran poin ini?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-3 py-1.5 text-xs font-bold text-white bg-[#5C8D3A] hover:bg-[#4A7F2F] rounded-lg transition-colors shadow-sm">
                                                Setujui
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.exchanges.reject', $exchange->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin MENOLAK penukaran ini? Poin akan dikembalikan ke nasabah.');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-3 py-1.5 text-xs font-bold text-white bg-red-500 hover:bg-red-600 rounded-lg transition-colors shadow-sm">
                                                Tolak
                                            </button>
                                        </form>
                                    </div>
                                @elseif($exchange->status === 'approved')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Disetujui
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
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                    <span class="text-sm font-medium">Belum ada riwayat penukaran poin.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
