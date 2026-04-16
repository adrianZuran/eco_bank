<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                        <button class="px-5 py-2 bg-white border border-gray-200 text-gray-700 rounded-full text-sm font-semibold shadow-sm hover:bg-gray-50 transition">3 Bulan</button>
                        <button class="px-5 py-2 bg-white border border-gray-200 text-gray-700 rounded-full text-sm font-semibold shadow-sm hover:bg-gray-50 transition">Semua</button>
                    </div>
                </div>

                <!-- EcoWallet Card -->
                <div class="bg-gradient-to-r from-[#3F6A28] to-[#4A7F2F] rounded-[2rem] p-8 sm:p-10 text-white shadow-xl relative overflow-hidden">
                    <!-- Decorative circle pattern -->
                    <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-5"></div>
                    <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 rounded-full bg-black opacity-10"></div>
                    
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center relative z-10">
                        <div>
                            <p class="text-green-50 font-medium tracking-wide mb-1">Saldo EcoWallet</p>
                            <h1 class="text-4xl sm:text-[3.5rem] font-extrabold mt-1 mb-3 tracking-tight">Rp 247.500</h1>
                            <p class="text-green-100 text-sm font-medium tracking-wide">
                                +Rp 85.000 bulan ini • Level: <span class="text-yellow-400 font-bold ml-1">EcoHero ★</span>
                            </p>
                        </div>
                        <div class="mt-8 sm:mt-0 flex gap-3 w-full sm:w-auto">
                            <button class="flex-1 sm:flex-none px-6 py-3 bg-transparent border border-green-300 text-green-50 rounded-xl text-sm font-bold tracking-wide hover:bg-white/10 transition text-center whitespace-nowrap">Tarik Saldo</button>
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
                            <h3 class="text-[1.75rem] font-extrabold text-gray-900 leading-tight">34.5 kg</h3>
                            <p class="text-sm text-gray-500 mt-2">Total Sampah Disetorkan</p>
                        </div>
                        <p class="text-sm text-[#4A7F2F] font-bold">▲ +8.2 kg <span class="text-gray-400 font-medium">dari bulan lalu</span></p>
                    </div>
                    
                    <!-- Stat 2 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100/60 flex flex-col justify-between h-full hover:shadow-md transition">
                        <div class="mb-6">
                            <svg class="w-7 h-7 text-[#6B9F4B] mb-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.5 2a.5.5 0 0 1 .5.5 10 10 0 0 1-5 9.778V14a2 2 0 1 1-4 0v-2a10 10 0 0 1 7.5-9.778A.5.5 0 0 1 12.5 2z" clip-rule="evenodd"/></svg>
                            <h3 class="text-[1.75rem] font-extrabold text-gray-900 leading-tight">12</h3>
                            <p class="text-sm text-gray-500 mt-2">Pohon Setara Diselamatkan</p>
                        </div>
                        <p class="text-sm text-[#4A7F2F] font-bold">▲ +3 pohon</p>
                    </div>
                    
                    <!-- Stat 3 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100/60 flex flex-col justify-between h-full hover:shadow-md transition">
                        <div class="mb-6">
                            <svg class="w-7 h-7 text-gray-600 mb-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.666 6.666c-.341-2.92-2.825-5.166-5.833-5.166-2.527 0-4.662 1.545-5.5 3.754C7.03 5.093 6.696 5 6.333 5 4.492 5 3 6.492 3 8.333c0 .114.007.227.021.341-1.745.547-3.021 2.215-3.021 4.159C0 15.134 1.866 17 4.167 17H19.5c2.485 0 4.5-2.015 4.5-4.5 0-2.34-1.79-4.269-4.06-4.476A6.155 6.155 0 0 0 18.666 6.666z"/></svg> 
                            <h3 class="text-[1.75rem] font-extrabold text-gray-900 leading-tight">48 kg</h3>
                            <p class="text-sm text-gray-500 mt-2">CO2 Tidak Diemisikan</p>
                        </div>
                        <p class="text-sm text-[#4A7F2F] font-bold">▲ +11 kg</p>
                    </div>
                    
                    <!-- Stat 4 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100/60 flex flex-col justify-between h-full hover:shadow-md transition">
                        <div class="mb-6">
                            <svg class="w-7 h-7 text-yellow-500 mb-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2l2.39 4.846 5.353.778-3.87 3.774.914 5.333L10 14.225l-4.787 2.506.914-5.333-3.871-3.774 5.353-.778L10 2z"/></svg>
                            <h3 class="text-[1.75rem] font-extrabold text-gray-900 leading-tight">1.240</h3>
                            <p class="text-sm text-gray-500 mt-2">EcoPoints Terkumpul</p>
                        </div>
                        <p class="text-sm text-[#4A7F2F] font-bold">▲ +320 poin</p>
                    </div>
                    
                    <!-- Stat 5 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100/60 flex flex-col justify-between h-full hover:shadow-md transition">
                        <div class="mb-6">
                            <svg class="w-7 h-7 text-blue-400 mb-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM5 19V5h14l.002 14H5z"/><path d="M7 7h10v2H7zm0 4h10v2H7zm0 4h7v2H7z"/></svg>
                            <h3 class="text-[1.75rem] font-extrabold text-gray-900 leading-tight">7</h3>
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
                        
                        <div class="flex items-start gap-5">
                            <div class="bg-[#F2F7EF] p-4 rounded-xl text-[#3F6A28]">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            </div>
                            <div class="flex-1 w-full pt-1">
                                <h4 class="text-base font-bold text-gray-900">Setorkan 5kg Plastik Minggu Ini</h4>
                                <p class="text-[13px] text-[#4A7F2F] font-bold mb-4">+150 EcoPoints</p>
                                
                                <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                    <div class="bg-[#3F6A28] h-2 rounded-full" style="width: 60%"></div>
                                </div>
                                <div class="flex justify-between text-[13px] text-gray-500 font-medium">
                                    <span>3kg / 5kg</span>
                                    <span>60%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Riwayat Transaksi -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100/60 p-7">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2.5">
                            <span class="bg-blue-100 p-2 rounded-full text-blue-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd" /><path fill-rule="evenodd" d="M12 7H8v2h4V7zm0 4H8v2h4v-2z" clip-rule="evenodd"/></svg>
                            </span>
                            Riwayat Transaksi
                        </h3>

                        <div class="space-y-6">
                            <!-- Trx 1 -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="bg-[#F2F7EF] p-3 rounded-full text-[#3F6A28]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[15px] font-bold text-gray-900">Plastik PET + Kardus</h4>
                                        <p class="text-[13px] text-gray-500 font-medium">12 Apr 2025 • EcoPoint Rungkut</p>
                                    </div>
                                </div>
                                <span class="text-base font-extrabold text-[#3F6A28]">+Rp 45.000</span>
                            </div>
                            <!-- Trx 2 -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="bg-[#F2F7EF] p-3 rounded-full text-[#3F6A28]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[15px] font-bold text-gray-900">Kaleng Aluminium</h4>
                                        <p class="text-[13px] text-gray-500 font-medium">05 Apr 2025 • EcoPoint Rungkut</p>
                                    </div>
                                </div>
                                <span class="text-base font-extrabold text-[#3F6A28]">+Rp 24.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
