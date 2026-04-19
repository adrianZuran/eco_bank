<x-app-layout>
    <div class="py-10 bg-[#FAFBFA] min-h-screen" x-data="{ filter: 'semua' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="text-center pt-4 pb-8">
                <div class="inline-flex items-center justify-center gap-2 mb-3">
                    <span class="text-[11px] font-extrabold text-[#5A8D3F] tracking-[0.15em] uppercase">Harga Real-Time</span>
                </div>
                <h1 class="text-[2.5rem] font-extrabold text-[#2C481A] mb-3 tracking-tight">Katalog Harga Sampah</h1>
                <p class="text-gray-500 font-medium text-sm">Diperbarui setiap hari kerja pukul 08:00 WIB - {{ now()->translatedFormat('l, d F Y') }}</p>
            </div>

            <!-- Filter Pills -->
            <div class="flex flex-wrap justify-center gap-2.5 mb-14">
                <button 
                    @click="filter = 'semua'" 
                    :class="filter === 'semua' ? 'bg-[#3F6A28] text-white border-transparent' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'" 
                    class="px-5 py-2 rounded-full border text-sm font-bold shadow-sm transition-colors">
                    Semua
                </button>
                
                @if(isset($categories['Plastik']))
                <button 
                    @click="filter = 'plastik'" 
                    :class="filter === 'plastik' ? 'bg-[#3F6A28] text-white border-transparent' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'" 
                    class="px-5 py-2 rounded-full border text-sm font-bold shadow-sm transition-colors flex items-center gap-2">
                    <div class="w-3 h-3 rounded-sm bg-blue-100 flex items-center justify-center"><div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div></div>
                    Plastik
                </button>
                @endif

                @if(isset($categories['Kertas']))
                <button 
                    @click="filter = 'kertas'" 
                    :class="filter === 'kertas' ? 'bg-[#3F6A28] text-white border-transparent' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'" 
                    class="px-5 py-2 rounded-full border text-sm font-bold shadow-sm transition-colors flex items-center gap-2">
                    <div class="w-3 h-3 rounded-sm bg-orange-100 flex items-center justify-center"><div class="w-1.5 h-1.5 rounded-full bg-orange-400"></div></div>
                    Kertas
                </button>
                @endif

                @if(isset($categories['Logam']))
                <button 
                    @click="filter = 'logam'" 
                    :class="filter === 'logam' ? 'bg-[#3F6A28] text-white border-transparent' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'" 
                    class="px-5 py-2 rounded-full border text-sm font-bold shadow-sm transition-colors flex items-center gap-2">
                    <div class="w-3 h-3 rounded-sm bg-gray-200 flex items-center justify-center"><div class="w-1.5 h-1.5 rounded-full bg-gray-500"></div></div>
                    Logam
                </button>
                @endif

                @if(isset($categories['Kaca']))
                <button 
                    @click="filter = 'kaca'" 
                    :class="filter === 'kaca' ? 'bg-[#3F6A28] text-white border-transparent' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'" 
                    class="px-5 py-2 rounded-full border text-sm font-bold shadow-sm transition-colors flex items-center gap-2">
                    <div class="w-3 h-3 rounded-sm bg-cyan-100 flex items-center justify-center"><div class="w-1.5 h-1.5 rounded-full bg-cyan-400"></div></div>
                    Kaca
                </button>
                @endif

                @if(isset($categories['Elektronik']))
                <button 
                    @click="filter = 'elektronik'" 
                    :class="filter === 'elektronik' ? 'bg-[#3F6A28] text-white border-transparent' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'" 
                    class="px-5 py-2 rounded-full border text-sm font-bold shadow-sm transition-colors flex items-center gap-2">
                    <div class="w-3 h-3 rounded-sm bg-red-100 flex items-center justify-center"><div class="w-1.5 h-1.5 rounded-full bg-red-400"></div></div>
                    Elektronik
                </button>
                @endif

                @if(isset($categories['Tekstil']))
                <button 
                    @click="filter = 'tekstil'" 
                    :class="filter === 'tekstil' ? 'bg-[#3F6A28] text-white border-transparent' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'" 
                    class="px-5 py-2 rounded-full border text-sm font-bold shadow-sm transition-colors flex items-center gap-2">
                    <div class="w-3 h-3 rounded-sm bg-green-100 flex items-center justify-center"><div class="w-1.5 h-1.5 rounded-full bg-green-400"></div></div>
                    Tekstil
                </button>
                @endif
            </div>

            <div class="pb-16 flex flex-col gap-12">
                @if($categories->isEmpty())
                    <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-100">
                        <p class="text-gray-500 font-medium">Belum ada data harga sampah di katalog.</p>
                    </div>
                @endif

                <!-- Kategori 1: Plastik -->
                @if(isset($categories['Plastik']))
                <div x-show="filter === 'semua' || filter === 'plastik'" x-transition.opacity.duration.300ms style="display: none;" :style="{ display: 'block' }">
                    <div class="flex items-center gap-3 mb-5 pl-1">
                        <div class="w-1.5 h-6 bg-[#4A7F2F] rounded-full"></div>
                        <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center"><div class="w-3 h-3 rounded-full bg-blue-500"></div></div>
                        <h2 class="text-xl font-extrabold text-[#2C481A]">Plastik</h2>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        @foreach($categories['Plastik'] as $item)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100/80 overflow-hidden hover:shadow-md transition cursor-pointer">
                            <div class="h-32 bg-[#F6F8F5] flex items-center justify-center p-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-blue-300 to-blue-500 rounded-full shadow-inner flex items-center justify-center opacity-90">
                                    <span class="text-white font-extrabold text-lg">{{ substr($item->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">{{ $item->category }} @if($item->sub_category) &bull; {{ $item->sub_category }} @endif</p>
                                <h3 class="font-extrabold text-gray-800 text-sm mb-2">{{ $item->name }}</h3>
                                <p class="text-[#3F6A28] font-extrabold text-lg flex items-baseline gap-1">Rp {{ number_format($item->price_per_kg, 0, ',', '.') }} <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                                @if($item->trend === 'naik')
                                <p class="text-[#4A7F2F] text-[11px] font-bold mt-1.5 flex items-center gap-1">▲ {{ $item->trend_amount }}</p>
                                @elseif($item->trend === 'turun')
                                <p class="text-red-500 text-[11px] font-bold mt-1.5 flex items-center gap-1">▼ {{ $item->trend_amount }}</p>
                                @else
                                <p class="text-gray-500 text-[11px] font-bold mt-1.5 flex items-center gap-1"><span class="text-gray-400">-</span> Stabil</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Kategori 2: Kertas -->
                @if(isset($categories['Kertas']))
                <div x-show="filter === 'semua' || filter === 'kertas'" x-transition.opacity.duration.300ms style="display: none;" :style="{ display: 'block' }">
                    <div class="flex items-center gap-3 mb-5 pl-1">
                        <div class="w-1.5 h-6 bg-[#4A7F2F] rounded-full"></div>
                        <div class="w-6 h-6 rounded-full bg-orange-100 flex items-center justify-center"><div class="w-3 h-3 rounded-sm bg-orange-400"></div></div>
                        <h2 class="text-xl font-extrabold text-[#2C481A]">Kertas</h2>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($categories['Kertas'] as $item)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100/80 overflow-hidden hover:shadow-md transition cursor-pointer">
                            <div class="h-32 bg-[#F6F8F5] flex items-center justify-center p-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-orange-300 to-orange-500 rounded shadow-inner flex items-center justify-center opacity-90 border-t-4 border-orange-600">
                                    <span class="text-white font-extrabold text-lg">{{ substr($item->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">{{ $item->category }} @if($item->sub_category) &bull; {{ $item->sub_category }} @endif</p>
                                <h3 class="font-extrabold text-gray-800 text-sm mb-2">{{ $item->name }}</h3>
                                <p class="text-[#3F6A28] font-extrabold text-lg flex items-baseline gap-1">Rp {{ number_format($item->price_per_kg, 0, ',', '.') }} <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                                @if($item->trend === 'naik')
                                <p class="text-[#4A7F2F] text-[11px] font-bold mt-1.5 flex items-center gap-1">▲ {{ $item->trend_amount }}</p>
                                @elseif($item->trend === 'turun')
                                <p class="text-red-500 text-[11px] font-bold mt-1.5 flex items-center gap-1">▼ {{ $item->trend_amount }}</p>
                                @else
                                <p class="text-gray-500 text-[11px] font-bold mt-1.5 flex items-center gap-1"><span class="text-gray-400">-</span> Stabil</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Kategori 3: Logam -->
                @if(isset($categories['Logam']))
                <div x-show="filter === 'semua' || filter === 'logam'" x-transition.opacity.duration.300ms style="display: none;" :style="{ display: 'block' }">
                    <div class="flex items-center gap-3 mb-5 pl-1">
                        <div class="w-1.5 h-6 bg-[#4A7F2F] rounded-full"></div>
                        <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center"><div class="w-3 h-3 rounded-full bg-gray-500"></div></div>
                        <h2 class="text-xl font-extrabold text-[#2C481A]">Logam</h2>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($categories['Logam'] as $item)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100/80 overflow-hidden hover:shadow-md transition cursor-pointer">
                            <div class="h-32 bg-[#F6F8F5] flex items-center justify-center p-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-gray-400 to-gray-600 rounded-full shadow-inner flex items-center justify-center opacity-90 border-[3px] border-gray-300">
                                    <span class="text-white font-extrabold text-lg">{{ substr($item->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">{{ $item->category }} @if($item->sub_category) &bull; {{ $item->sub_category }} @endif</p>
                                <h3 class="font-extrabold text-gray-800 text-sm mb-2">{{ $item->name }}</h3>
                                <p class="text-[#3F6A28] font-extrabold text-lg flex items-baseline gap-1">Rp {{ number_format($item->price_per_kg, 0, ',', '.') }} <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                                @if($item->trend === 'naik')
                                <p class="text-[#4A7F2F] text-[11px] font-bold mt-1.5 flex items-center gap-1">▲ {{ $item->trend_amount }}</p>
                                @elseif($item->trend === 'turun')
                                <p class="text-red-500 text-[11px] font-bold mt-1.5 flex items-center gap-1">▼ {{ $item->trend_amount }}</p>
                                @else
                                <p class="text-gray-500 text-[11px] font-bold mt-1.5 flex items-center gap-1"><span class="text-gray-400">-</span> Stabil</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Kategori 4: Kaca -->
                @if(isset($categories['Kaca']))
                <div x-show="filter === 'semua' || filter === 'kaca'" x-transition.opacity.duration.300ms style="display: none;" :style="{ display: 'block' }">
                    <div class="flex items-center gap-3 mb-5 pl-1">
                        <div class="w-1.5 h-6 bg-[#4A7F2F] rounded-full"></div>
                        <div class="w-6 h-6 rounded-full bg-cyan-100 flex items-center justify-center"><div class="w-3 h-3 rounded-full bg-cyan-400"></div></div>
                        <h2 class="text-xl font-extrabold text-[#2C481A]">Kaca</h2>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($categories['Kaca'] as $item)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100/80 overflow-hidden hover:shadow-md transition cursor-pointer">
                            <div class="h-32 bg-[#F6F8F5] flex items-center justify-center p-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-cyan-300 to-cyan-500 rounded-lg shadow-inner flex items-center justify-center opacity-80 transform rotate-12">
                                    <span class="text-white font-extrabold text-lg transform -rotate-12">{{ substr($item->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">{{ $item->category }} @if($item->sub_category) &bull; {{ $item->sub_category }} @endif</p>
                                <h3 class="font-extrabold text-gray-800 text-sm mb-2">{{ $item->name }}</h3>
                                <p class="text-[#3F6A28] font-extrabold text-lg flex items-baseline gap-1">Rp {{ number_format($item->price_per_kg, 0, ',', '.') }} <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                                @if($item->trend === 'naik')
                                <p class="text-[#4A7F2F] text-[11px] font-bold mt-1.5 flex items-center gap-1">▲ {{ $item->trend_amount }}</p>
                                @elseif($item->trend === 'turun')
                                <p class="text-red-500 text-[11px] font-bold mt-1.5 flex items-center gap-1">▼ {{ $item->trend_amount }}</p>
                                @else
                                <p class="text-gray-500 text-[11px] font-bold mt-1.5 flex items-center gap-1"><span class="text-gray-400">-</span> Stabil</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Kategori 5: Elektronik -->
                @if(isset($categories['Elektronik']))
                <div x-show="filter === 'semua' || filter === 'elektronik'" x-transition.opacity.duration.300ms style="display: none;" :style="{ display: 'block' }">
                    <div class="flex items-center gap-3 mb-5 pl-1">
                        <div class="w-1.5 h-6 bg-[#4A7F2F] rounded-full"></div>
                        <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center"><div class="w-3 h-3 rounded-sm bg-red-400"></div></div>
                        <h2 class="text-xl font-extrabold text-[#2C481A]">Elektronik</h2>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($categories['Elektronik'] as $item)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100/80 overflow-hidden hover:shadow-md transition cursor-pointer">
                            <div class="h-32 bg-[#F6F8F5] flex items-center justify-center p-4">
                                <div class="w-14 h-12 bg-[#516E5A] rounded px-2 py-1 shadow-inner flex items-center justify-center relative bg-gradient-to-br from-gray-700 to-gray-900">
                                    <span class="text-white font-extrabold text-lg">{{ substr($item->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">{{ $item->category }} @if($item->sub_category) &bull; {{ $item->sub_category }} @endif</p>
                                <h3 class="font-extrabold text-gray-800 text-sm mb-2">{{ $item->name }}</h3>
                                <p class="text-[#3F6A28] font-extrabold text-lg flex items-baseline gap-1">Rp {{ number_format($item->price_per_kg, 0, ',', '.') }} <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                                @if($item->trend === 'naik')
                                <p class="text-[#4A7F2F] text-[11px] font-bold mt-1.5 flex items-center gap-1">▲ {{ $item->trend_amount }}</p>
                                @elseif($item->trend === 'turun')
                                <p class="text-red-500 text-[11px] font-bold mt-1.5 flex items-center gap-1">▼ {{ $item->trend_amount }}</p>
                                @else
                                <p class="text-gray-500 text-[11px] font-bold mt-1.5 flex items-center gap-1"><span class="text-gray-400">-</span> Stabil</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Kategori 6: Tekstil -->
                @if(isset($categories['Tekstil']))
                <div x-show="filter === 'semua' || filter === 'tekstil'" x-transition.opacity.duration.300ms style="display: none;" :style="{ display: 'block' }">
                    <div class="flex items-center gap-3 mb-5 pl-1">
                        <div class="w-1.5 h-6 bg-[#4A7F2F] rounded-full"></div>
                        <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center"><div class="w-3 h-3 rounded-sm bg-green-400"></div></div>
                        <h2 class="text-xl font-extrabold text-[#2C481A]">Tekstil</h2>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($categories['Tekstil'] as $item)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100/80 overflow-hidden hover:shadow-md transition cursor-pointer">
                            <div class="h-32 bg-[#F6F8F5] flex items-center justify-center p-4">
                                <div class="w-14 h-14 border-[4px] border-orange-300 bg-orange-100 rounded flex items-center justify-center relative">
                                    <span class="text-orange-600 font-extrabold text-lg">{{ substr($item->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">{{ $item->category }} @if($item->sub_category) &bull; {{ $item->sub_category }} @endif</p>
                                <h3 class="font-extrabold text-gray-800 text-sm mb-2">{{ $item->name }}</h3>
                                <p class="text-[#3F6A28] font-extrabold text-lg flex items-baseline gap-1">Rp {{ number_format($item->price_per_kg, 0, ',', '.') }} <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                                @if($item->trend === 'naik')
                                <p class="text-[#4A7F2F] text-[11px] font-bold mt-1.5 flex items-center gap-1">▲ {{ $item->trend_amount }}</p>
                                @elseif($item->trend === 'turun')
                                <p class="text-red-500 text-[11px] font-bold mt-1.5 flex items-center gap-1">▼ {{ $item->trend_amount }}</p>
                                @else
                                <p class="text-gray-500 text-[11px] font-bold mt-1.5 flex items-center gap-1"><span class="text-gray-400">-</span> Stabil</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
