<x-admin-layout>
    <x-slot name="header">
        Admin Dashboard
    </x-slot>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
        <!-- Users Stat -->
        <div class="p-6 bg-white border border-gray-100 rounded-2xl shadow-sm flex items-center justify-between hover:shadow-md transition-shadow">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-widest">Total Nasabah</p>
                <p class="text-3xl font-extrabold text-gray-900 mt-2">{{ $users->count() }}</p>
            </div>
            <div class="p-4 bg-blue-50 rounded-xl">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
        </div>

        <!-- Transactions Stat -->
        <div class="p-6 bg-white border border-gray-100 rounded-2xl shadow-sm flex items-center justify-between hover:shadow-md transition-shadow">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-widest">Total Setoran</p>
                <p class="text-3xl font-extrabold text-gray-900 mt-2">{{ $totalTransactions }}</p>
            </div>
            <div class="p-4 bg-green-50 rounded-xl">
                <svg class="w-8 h-8 text-[#5C8D3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            </div>
        </div>

        <!-- Weight Stat -->
        <div class="p-6 bg-white border border-gray-100 rounded-2xl shadow-sm flex items-center justify-between hover:shadow-md transition-shadow">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-widest">Total Berat (Kg)</p>
                <p class="text-3xl font-extrabold text-gray-900 mt-2">{{ number_format($totalWeight, 1) }} <span class="text-lg text-gray-400">kg</span></p>
            </div>
            <div class="p-4 bg-purple-50 rounded-xl">
                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 rounded-xl" role="alert">
        <span class="block sm:inline font-medium">{{ session('success') }}</span>
    </div>
    @endif
    @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6 rounded-xl" role="alert">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Add User Section -->
    <div class="mb-8 bg-white border border-gray-100 rounded-2xl shadow-sm p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                <span class="bg-[#EBF2E5] p-2 rounded-lg text-[#5C8D3A]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </span>
                Tambah Nasabah Baru
            </h3>
        </div>
        <form action="{{ route('admin.users.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-start">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="name" required placeholder="Contoh: Budi Santoso" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#5C8D3A] focus:ring focus:ring-[#5C8D3A] focus:ring-opacity-50 text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email Aktif <span class="text-red-500">*</span></label>
                <input type="email" name="email" required placeholder="budi@contoh.com" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#5C8D3A] focus:ring focus:ring-[#5C8D3A] focus:ring-opacity-50 text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                <input type="password" name="password" required minlength="8" placeholder="Minimal 8 karakter" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#5C8D3A] focus:ring focus:ring-[#5C8D3A] focus:ring-opacity-50 text-sm">
            </div>
            <div class="md:pt-6">
                <button type="submit" class="w-full bg-[#3F6A28] hover:bg-[#345920] text-white font-bold py-[10px] px-4 rounded-xl shadow-sm transition-colors flex justify-center items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Daftarkan Akun
                </button>
            </div>
        </form>
    </div>

    <!-- Users Table -->
    <div class="overflow-hidden bg-white border border-gray-100 rounded-2xl shadow-sm">
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-white">
            <h3 class="text-lg font-bold text-gray-800">Daftar Nasabah (User)</h3>
            <span class="px-3 py-1 text-xs font-semibold text-[#5C8D3A] bg-[#EBF2E5] rounded-full">Diperbarui Baru Saja</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">ID</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Nama Nasabah</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Email</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Tanggal Bergabung</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100">Saldo Wallet</th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-gray-500 uppercase border-b border-gray-100 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4 text-sm text-gray-500 font-medium whitespace-nowrap">
                                #{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-gray-200 to-gray-300 flex items-center justify-center text-gray-600 font-bold text-xs uppercase">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <span class="text-sm font-bold text-gray-900 group-hover:text-[#5C8D3A] transition-colors">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 text-xs font-medium text-gray-600 bg-gray-100 rounded-full">
                                    {{ $user->created_at->format('d M Y') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-extrabold text-[#2C481A]">
                                Rp {{ number_format($user->balance, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <button class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">Lihat Detail</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    <span class="text-sm font-medium">Belum ada user yang terdaftar.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
