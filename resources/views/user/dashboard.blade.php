<x-app-layout>
    <div class="py-10" x-data="{ showModal: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Alert Messages -->
            @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline font-medium">{{ session('success') }}</span>
            </div>
            @endif
            @if(session('error'))
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline font-medium">{{ session('error') }}</span>
            </div>
            @endif
            @if($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- EcoBank User Dashboard -->
            <div class="flex flex-col gap-8">
                <!-- Greeting Row -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <div class="mb-4 sm:mb-0">
                        <p class="text-gray-500 mb-1">Selamat pagi,</p>
                        <h2 class="text-3xl font-extrabold text-[#2F4F22] flex items-center gap-2">
                            {{ auth()->user()->name }}
                            <svg class="w-6 h-6 text-[#6B9F4B]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.5 2a.5.5 0 0 1 .5.5 10 10 0 0 1-5 9.778V14a2 2 0 1 1-4 0v-2c0-.525.1-1.035.285-1.516A7.478 7.478 0 0 0 12 4.417a7.518 7.518 0 0 0 3-1.637l-2.5-.78z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M9.544 5.378A5.485 5.485 0 0 0 8 9.5a5.5 5.5 0 0 0-1.544-4.122A12.016 12.016 0 0 1 9.544 5.378z" clip-rule="evenodd"/>
                            </svg>
                        </h2>
                    </div>
                    <div class="flex gap-2">
                        <button class="px-5 py-2 bg-[#3F6A28] text-white rounded-full text-sm font-semibold shadow-sm hover:bg-[#345920] transition">Bulan Ini</button>
                    </div>
                </div>

                <!-- EcoWallet Card -->
                <div class="bg-gradient-to-r from-[#3F6A28] to-[#4A7F2F] rounded-[2rem] p-8 sm:p-10 text-white shadow-xl relative overflow-hidden">
                    <!-- Decorative circle pattern -->
                    <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-5"></div>
                    <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 rounded-full bg-black opacity-10"></div>
                    
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center relative z-10">
                        <div>
                            <p class="text-green-50 font-medium tracking-wide mb-1">Poin Terkumpul</p>
                            <h1 class="text-4xl sm:text-[3.5rem] font-extrabold mt-1 mb-3 tracking-tight">{{ number_format(auth()->user()->balance, 0, ',', '.') }} Poin</h1>
                            <p class="text-green-100 text-sm font-medium tracking-wide">
                                +85.000 Poin bulan ini • Level: <span class="text-yellow-400 font-bold ml-1">EcoHero ★</span>
                            </p>
                        </div>
                        <div class="mt-8 sm:mt-0 flex gap-3 w-full sm:w-auto">
                            <button @click="showModal = true" class="flex-1 sm:flex-none px-6 py-3 bg-transparent border border-green-300 text-green-50 rounded-xl text-sm font-bold tracking-wide hover:bg-white/10 transition text-center whitespace-nowrap">Tukar Poin</button>
                            <a href="{{ route('deposit.index') }}" class="inline-block flex-1 sm:flex-none px-6 py-3 bg-white text-[#3F6A28] rounded-xl text-sm font-bold tracking-wide hover:bg-gray-100 shadow-md transition text-center whitespace-nowrap">+ Setor Sampah</a>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    <!-- Stat 1 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100/60 flex flex-col justify-between h-full hover:shadow-md transition">
                        <div class="mb-6">
                            <svg class="w-7 h-7 text-gray-800 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            <h3 class="text-[1.75rem] font-extrabold text-gray-900 leading-tight">{{ number_format($totalWeight, 1) }} kg</h3>
                            <p class="text-sm text-gray-500 mt-2">Total Sampah Disetorkan</p>
                        </div>
                        <p class="text-sm text-[#4A7F2F] font-bold">▲ +8.2 kg <span class="text-gray-400 font-medium">dari bulan lalu</span></p>
                    </div>
                    
                    <!-- Stat 4 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100/60 flex flex-col justify-between h-full hover:shadow-md transition">
                        <div class="mb-6">
                            <svg class="w-7 h-7 text-yellow-500 mb-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2l2.39 4.846 5.353.778-3.87 3.774.914 5.333L10 14.225l-4.787 2.506.914-5.333-3.871-3.774 5.353-.778L10 2z"/></svg>
                            <h3 class="text-[1.75rem] font-extrabold text-gray-900 leading-tight">{{ number_format($ecoPoints, 0, ',', '.') }}</h3>
                            <p class="text-sm text-gray-500 mt-2">EcoPoints Terkumpul</p>
                        </div>
                        <p class="text-sm text-[#4A7F2F] font-bold">▲ +320 poin</p>
                    </div>
                    
                    <!-- Stat 5 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100/60 flex flex-col justify-between h-full hover:shadow-md transition">
                        <div class="mb-6">
                            <svg class="w-7 h-7 text-blue-400 mb-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM5 19V5h14l.002 14H5z"/><path d="M7 7h10v2H7zm0 4h10v2H7zm0 4h7v2H7z"/></svg>
                            <h3 class="text-[1.75rem] font-extrabold text-gray-900 leading-tight">{{ $totalTransactions }}</h3>
                            <p class="text-sm text-gray-500 mt-2">Total Transaksi</p>
                        </div>
                        <p class="text-sm text-[#4A7F2F] font-bold">▲ +2 transaksi</p>
                    </div>
                </div>

                <!-- Bottom Section (Misi Aktif & Riwayat Transaksi) -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-2">
                    <!-- Misi Aktif -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100/60 p-7">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2.5">
                            <span class="bg-pink-100 p-2 rounded-full text-pink-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
                            </span>
                            Misi Aktif
                        </h3>
                        
                        <div class="space-y-4">
                            @forelse($activeMissions as $mission)
                                @php
                                    $userMission = $userMissions->get($mission->id);
                                @endphp
                                <div class="flex items-start gap-4 p-4 rounded-xl border {{ $userMission ? 'bg-gray-50 border-gray-200' : 'bg-white border-[#3F6A28]/20' }}">
                                    <div class="{{ $userMission ? 'bg-gray-200 text-gray-500' : 'bg-[#F2F7EF] text-[#3F6A28]' }} p-3 rounded-xl flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    </div>
                                    <div class="flex-1 w-full pt-1">
                                        <h4 class="text-base font-bold {{ $userMission ? 'text-gray-600' : 'text-gray-900' }}">{{ $mission->title }}</h4>
                                        <p class="text-[13px] text-gray-500 mt-1 mb-2">{{ $mission->description }}</p>
                                        <p class="text-[13px] font-bold mb-3 {{ $userMission ? 'text-gray-500' : 'text-[#4A7F2F]' }}">Hadiah: +{{ $mission->reward_points }} Poin</p>
                                        
                                        @if(!$userMission)
                                            <form action="{{ route('user.missions.complete', $mission->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="w-full py-2 bg-[#3F6A28] text-white text-xs font-bold rounded-lg hover:bg-[#345920] transition">Klaim Misi</button>
                                            </form>
                                        @elseif($userMission->status === 'pending')
                                            <div class="w-full py-2 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-lg text-center">Menunggu Verifikasi</div>
                                        @else
                                            <div class="w-full py-2 bg-green-100 text-green-800 text-xs font-bold rounded-lg text-center flex justify-center items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                Selesai
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="text-center p-6 bg-gray-50 rounded-xl border border-gray-100">
                                    <p class="text-sm text-gray-500">Belum ada misi aktif saat ini.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100/60 p-7">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2.5">
                            <span class="bg-blue-100 p-2 rounded-full text-blue-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd" /><path fill-rule="evenodd" d="M12 7H8v2h4V7zm0 4H8v2h4v-2z" clip-rule="evenodd"/></svg>
                            </span>
                            Riwayat Transaksi
                        </h3>

                        <div class="space-y-6">
                            @forelse($recentTransactions as $trx)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="bg-[#F2F7EF] p-3 rounded-full text-[#3F6A28]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[15px] font-bold text-gray-900">{{ $trx->wasteCategory->name ?? 'Sampah' }}</h4>
                                        <p class="text-[13px] text-gray-500 font-medium">{{ $trx->created_at->format('d M Y') }} • {{ $trx->ecopoint_branch ?? $trx->shipping_type }}</p>
                                    </div>
                                </div>
                                <span class="text-base font-extrabold text-[#3F6A28]">+{{ number_format($trx->total_amount, 0, ',', '.') }} Poin</span>
                            </div>
                            @empty
                            <p class="text-gray-500 text-sm text-center py-4">Belum ada transaksi di riwayat Anda.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal Tukar Poin -->
        <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showModal" class="fixed inset-0 transition-opacity" aria-hidden="true" x-transition.opacity>
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div x-show="showModal" class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full" x-transition.opacity>
                    <form action="{{ route('exchange.store') }}" method="POST" x-data="{ rewardType: 'uang', points: '' }">
                        @csrf
                        
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-[#3F6A28] to-[#5C8D3A] px-6 py-5 relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-24 h-24 rounded-full bg-white opacity-10"></div>
                            <h3 class="text-xl font-extrabold text-white relative z-10" id="modal-title">Tukar EcoPoints</h3>
                            <p class="text-green-50 text-sm mt-1 relative z-10">Poin Anda saat ini: <span class="font-bold text-yellow-300">{{ number_format(auth()->user()->balance, 0, ',', '.') }}</span></p>
                        </div>

                        <!-- Body -->
                        <div class="px-6 py-6 bg-white space-y-6">
                            <!-- Pilihan Penukaran -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-3">Pilih Jenis Penukaran</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="reward_type" value="uang" x-model="rewardType" class="peer sr-only">
                                        <div class="p-4 rounded-2xl border-2 transition-all peer-checked:border-[#5C8D3A] peer-checked:bg-[#F2F7EF] border-gray-100 hover:border-gray-200 text-center">
                                            <div class="w-10 h-10 mx-auto bg-green-100 text-[#5C8D3A] rounded-full flex items-center justify-center mb-2 shadow-sm">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                            </div>
                                            <span class="block text-sm font-bold text-gray-800">Tunai</span>
                                            <span class="block text-[11px] text-gray-500 mt-1">E-Wallet / Bank</span>
                                        </div>
                                        <div class="absolute top-2 right-2 hidden peer-checked:block text-[#5C8D3A]">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                        </div>
                                    </label>

                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="reward_type" value="pulsa" x-model="rewardType" class="peer sr-only">
                                        <div class="p-4 rounded-2xl border-2 transition-all peer-checked:border-[#5C8D3A] peer-checked:bg-[#F2F7EF] border-gray-100 hover:border-gray-200 text-center">
                                            <div class="w-10 h-10 mx-auto bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-2 shadow-sm">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <span class="block text-sm font-bold text-gray-800">Pulsa</span>
                                            <span class="block text-[11px] text-gray-500 mt-1">All Operator</span>
                                        </div>
                                        <div class="absolute top-2 right-2 hidden peer-checked:block text-[#5C8D3A]">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Jumlah Poin -->
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <label class="block text-sm font-bold text-gray-700">Jumlah Poin <span class="text-red-500">*</span></label>
                                    <span class="text-[11px] font-semibold text-gray-500 bg-gray-100 px-2 py-0.5 rounded-md">Min. 1000 Poin</span>
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2l2.39 4.846 5.353.778-3.87 3.774.914 5.333L10 14.225l-4.787 2.506.914-5.333-3.871-3.774 5.353-.778L10 2z"/></svg>
                                    </div>
                                    <input type="number" name="points_deducted" x-model="points" min="1000" max="{{ auth()->user()->balance }}" required class="pl-12 w-full rounded-xl border-gray-300 shadow-sm focus:border-[#5C8D3A] focus:ring focus:ring-[#5C8D3A]/30 text-sm font-bold py-3 transition-shadow" placeholder="Masukkan jumlah poin">
                                </div>
                                <p class="text-[12px] text-gray-500 mt-2 flex items-center gap-1" x-show="points && points >= 1000">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Estimasi nilai: <span class="font-bold text-[#5C8D3A]" x-text="'Rp ' + (points * 1).toLocaleString('id-ID')"></span>
                                </p>
                            </div>

                            <!-- Info Akun -->
                            <div x-show="rewardType === 'uang'" x-transition>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Detail Rekening / E-Wallet <span class="text-red-500">*</span></label>
                                <input type="text" name="account_info" :required="rewardType === 'uang'" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#5C8D3A] focus:ring focus:ring-[#5C8D3A]/30 text-sm py-3 transition-shadow" placeholder="Contoh: Gopay 08123456789 / BCA 1234567890" :disabled="rewardType !== 'uang'">
                                <p class="text-[11px] text-gray-500 mt-1">Pastikan nama bank/e-wallet dan nomor sudah benar.</p>
                            </div>
                            
                            <div x-show="rewardType === 'pulsa'" x-transition style="display: none;">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nomor HP / Provider <span class="text-red-500">*</span></label>
                                <input type="text" name="account_info" :required="rewardType === 'pulsa'" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#5C8D3A] focus:ring focus:ring-[#5C8D3A]/30 text-sm py-3 transition-shadow" placeholder="Contoh: Telkomsel 08123456789" :disabled="rewardType !== 'pulsa'">
                                <p class="text-[11px] text-gray-500 mt-1">Pastikan nomor HP tujuan aktif.</p>
                            </div>
                        </div>
                        
                        <!-- Footer -->
                        <div class="bg-gray-50 px-6 py-4 flex flex-col-reverse sm:flex-row sm:justify-end gap-3 border-t border-gray-100">
                            <button type="button" @click="showModal = false" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl border border-gray-300 shadow-sm px-5 py-2.5 bg-white text-sm font-bold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5C8D3A] transition-colors">
                                Batal
                            </button>
                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl border border-transparent shadow-md px-5 py-2.5 bg-[#3F6A28] text-sm font-bold text-white hover:bg-[#345920] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5C8D3A] transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Kirim Permintaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
