<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-[#3F6A28] overflow-hidden pt-16 pb-24 lg:pt-24 lg:pb-32">
        <!-- Abstract Shape/Gradient -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-[#4A7F2F] rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[500px] h-[500px] bg-[#345920] rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/20 bg-white/10 backdrop-blur-md mb-8">
                    <div class="w-2 h-2 rounded-full bg-green-300"></div>
                    <span class="text-xs font-bold text-white tracking-widest uppercase">Solusi Bank Sampah Digital #1 di Indonesia</span>
                </div>
                
                <h1 class="text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight">
                    Sampahmu Bernilai,<br>
                    <span class="text-[#AEE684]">Bumi Lebih Bersih</span>
                </h1>
                
                <p class="text-lg text-green-50 mb-10 max-w-2xl leading-relaxed">
                    EcoBank menghubungkan masyarakat, titik setor, dan admin dalam satu platform digital. 
                    Setor sampah, dapatkan reward, dan lihat dampaknya nyata.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 mb-16">
                    <a href="{{ route('deposit.index') }}" class="px-8 py-4 bg-white text-[#2C481A] rounded-md font-bold text-base hover:bg-gray-50 transition shadow-lg flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Jual Sampah Sekarang
                    </a>
                    <a href="{{ route('catalog') }}" class="px-8 py-4 bg-transparent border border-white/30 text-white rounded-md font-bold text-base hover:bg-white/10 transition flex items-center justify-center gap-2">
                        Lihat Harga Sampah
                    </a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div>
                        <div class="text-3xl font-extrabold text-white mb-1">12.400+</div>
                        <div class="text-sm text-green-100/80 font-medium">Pengguna Aktif</div>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-white mb-1">340 ton</div>
                        <div class="text-sm text-green-100/80 font-medium">Sampah Daur Ulang</div>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-white mb-1">850+</div>
                        <div class="text-sm text-green-100/80 font-medium">Titik Setor Mitra</div>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-white mb-1">2,4 Juta Poin</div>
                        <div class="text-sm text-green-100/80 font-medium">Poin Ditukarkan Warga</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section -->
    <div class="py-20 bg-[#FAFBFA]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-14">
                <span class="text-[11px] font-extrabold text-[#5A8D3F] tracking-[0.15em] uppercase block mb-3">Fitur Unggulan</span>
                <h2 class="text-[2.25rem] font-extrabold text-[#2C481A] mb-4 tracking-tight max-w-xl">
                    Tukerkan Sampahmu dan Dapatkan cuan
                </h2>
                <p class="text-gray-500 font-medium text-sm max-w-2xl">
                    Dari setor sampah hingga dompet digital — EcoBank memudahkan seluruh proses daur ulang sampahmu.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="w-14 h-14 bg-[#F6F8F5] rounded-xl flex items-center justify-center mb-6">
                        <div class="w-8 h-8 bg-pink-100 rounded flex items-center justify-center shadow-inner">
                            <span class="text-pink-500 font-bold text-xs">+/-</span>
                        </div>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-800 mb-3">Kalkulator Sampah</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Estimasi nilai sampahmu sebelum setor. Masukkan jenis dan berat — langsung tampil harga terkini.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="w-14 h-14 bg-[#F6F8F5] rounded-xl flex items-center justify-center mb-6">
                        <div class="w-7 h-7 bg-yellow-100 rounded-full flex items-center justify-center shadow-inner">
                            <span class="text-yellow-500 text-sm">🏆</span>
                        </div>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-800 mb-3">Misi & Gamifikasi</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Selesaikan misi mingguan, kumpulkan poin, raih level EcoHero, dan tukar hadiah menarik.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="w-14 h-14 bg-[#F6F8F5] rounded-xl flex items-center justify-center mb-6">
                        <div class="w-6 h-8 bg-green-200 rounded-t-full shadow-inner flex justify-center">
                            <div class="w-2 h-2 bg-green-600 rounded-full mt-2"></div>
                        </div>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-800 mb-3">Peta Titik Setor</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Temukan EcoPoint terdekat dari lokasimu. Lihat jam operasional, kapasitas, dan rating mitra.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="py-24 bg-[#1E3315]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-14">
                <span class="text-[11px] font-extrabold text-[#AEE684] tracking-[0.15em] uppercase block mb-3">Cara Kerja</span>
                <h2 class="text-[2.25rem] font-extrabold text-white mb-4 tracking-tight">
                    Mulai dalam 4 Langkah Mudah
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10">
                <!-- Connecting Line (Desktop only) -->
                <div class="hidden md:block absolute top-[28px] left-[12%] right-[12%] h-[2px] bg-[#345920] -z-10"></div>

                <!-- Step 1 -->
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 rounded-full bg-[#3F6A28] border-4 border-[#1E3315] text-white font-bold text-xl flex items-center justify-center mb-6 shadow-xl">1</div>
                    <h3 class="text-white font-extrabold text-lg mb-3">Daftar Akun</h3>
                    <p class="text-[#A4B39B] text-sm leading-relaxed px-4">Buat akun gratis dengan email atau nomor WhatsApp. Verifikasi dalam 30 detik.</p>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 rounded-full bg-[#3F6A28] border-4 border-[#1E3315] text-white font-bold text-xl flex items-center justify-center mb-6 shadow-xl">2</div>
                    <h3 class="text-white font-extrabold text-lg mb-3">Pilih Sampahmu</h3>
                    <p class="text-[#A4B39B] text-sm leading-relaxed px-4">Pisahkan sampah berdasarkan kategori. Gunakan katalog harga kami sebagai panduan.</p>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 rounded-full bg-[#3F6A28] border-4 border-[#1E3315] text-white font-bold text-xl flex items-center justify-center mb-6 shadow-xl">3</div>
                    <h3 class="text-white font-extrabold text-lg mb-3">Setor ke EcoPoint</h3>
                    <p class="text-[#A4B39B] text-sm leading-relaxed px-4">Kunjungi titik setor mitra terdekat atau ajukan penjemputan langsung dari rumah.</p>
                </div>

                <!-- Step 4 -->
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 rounded-full bg-[#3F6A28] border-4 border-[#1E3315] text-white font-bold text-xl flex items-center justify-center mb-6 shadow-xl">4</div>
                    <h3 class="text-white font-extrabold text-lg mb-3">Terima Pembayaran</h3>
                    <p class="text-[#A4B39B] text-sm leading-relaxed px-4">Saldo otomatis masuk ke EcoWallet. Cairkan kapan saja ke rekening bank.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Prices Section -->
    <div class="py-20 bg-[#FAFBFA]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-6">
                <div>
                    <span class="text-[11px] font-extrabold text-[#5A8D3F] tracking-[0.15em] uppercase block mb-3">Harga Terkini</span>
                    <h2 class="text-[2.25rem] font-extrabold text-[#2C481A] mb-2 tracking-tight">
                        Cek Harga Sampahmu
                    </h2>
                    <p class="text-gray-500 font-medium text-sm">Diperbarui setiap hari kerja</p>
                </div>
                <a href="{{ route('catalog') }}" class="px-5 py-2.5 rounded-full bg-white border border-gray-200 text-gray-700 text-sm font-bold shadow-sm hover:bg-gray-50 transition-colors flex items-center gap-2">
                    Lihat Semua &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Price Card 1 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition cursor-pointer">
                    <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Plastik</p>
                    <h3 class="font-extrabold text-gray-800 text-sm mb-2">Botol PET Bening</h3>
                    <p class="text-[#3F6A28] font-extrabold text-xl flex items-baseline gap-1 mb-1">2.500 Poin <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                    <p class="text-[#4A7F2F] text-[11px] font-bold flex items-center gap-1">▲ Naik 200 Poin</p>
                </div>
                
                <!-- Price Card 2 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition cursor-pointer">
                    <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Kertas</p>
                    <h3 class="font-extrabold text-gray-800 text-sm mb-2">Koran & Majalah</h3>
                    <p class="text-[#3F6A28] font-extrabold text-xl flex items-baseline gap-1 mb-1">1.800 Poin <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                    <p class="text-[#4A7F2F] text-[11px] font-bold flex items-center gap-1">▲ Stabil</p>
                </div>

                <!-- Price Card 3 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition cursor-pointer">
                    <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Logam</p>
                    <h3 class="font-extrabold text-gray-800 text-sm mb-2">Kaleng Aluminium</h3>
                    <p class="text-[#3F6A28] font-extrabold text-xl flex items-baseline gap-1 mb-1">8.000 Poin <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                    <p class="text-red-500 text-[11px] font-bold flex items-center gap-1">▼ Turun 500 Poin</p>
                </div>

                <!-- Price Card 4 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition cursor-pointer">
                    <p class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Kaca</p>
                    <h3 class="font-extrabold text-gray-800 text-sm mb-2">Botol Kaca Bening</h3>
                    <p class="text-[#3F6A28] font-extrabold text-xl flex items-baseline gap-1 mb-1">500 Poin <span class="text-xs text-gray-400 font-medium">/kg</span></p>
                    <p class="text-[#4A7F2F] text-[11px] font-bold flex items-center gap-1">▲ Naik 50 Poin</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
