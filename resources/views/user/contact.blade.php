<x-app-layout>
    <div class="py-16 bg-[#FAFBFA] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="text-center pb-12">
                <span class="text-[11px] font-extrabold text-[#5A8D3F] tracking-[0.15em] uppercase block mb-3">Hubungi Kami</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#2C481A] mb-4 tracking-tight">Pusat Informasi & Bantuan</h1>
                <p class="text-gray-500 font-medium text-sm">Kami siap membantu kamu setiap hari kerja 08.00–17.00 WIB</p>
            </div>

            <!-- Contact Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 mb-24">
                
                <!-- Left: Info -->
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-800 mb-3">PT Indonesia Bebas Sampah</h2>
                    <p class="text-gray-500 text-sm leading-relaxed mb-8">Silakan isi form berikut jika ingin menghubungi kami, kami sangat senang membantu.</p>

                    <ul class="space-y-6 mb-10">
                        <li class="flex items-start gap-4">
                            <span class="text-[#4A7F2F] mt-0.5">📍</span>
                            <span class="text-gray-600 text-sm font-medium">Jl. Raya ITS, Keputih, Sukolilo, Surabaya, Jawa Timur 60111</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="text-[#4A7F2F] mt-0.5">✉️</span>
                            <span class="text-gray-600 text-sm font-medium">tim7@ecobank.id</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="text-[#4A7F2F] mt-0.5">📱</span>
                            <span class="text-gray-600 text-sm font-medium">WhatsApp: 0811-ECOBANK (0811-3262265)</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="text-[#4A7F2F] mt-0.5">🕒</span>
                            <span class="text-gray-600 text-sm font-medium">Senin - Jumat, 08.00 - 17.00 WIB</span>
                        </li>
                    </ul>

                    <div>
                        <h3 class="text-sm font-extrabold text-gray-800 mb-4">Ikuti Kami</h3>
                        <div class="flex gap-3">
                            <a href="#" class="px-5 py-2 rounded-full border border-gray-200 bg-white text-gray-700 text-xs font-bold hover:bg-gray-50 transition shadow-sm">
                                Instagram
                            </a>
                            <a href="#" class="px-5 py-2 rounded-full border border-gray-200 bg-white text-gray-700 text-xs font-bold hover:bg-gray-50 transition shadow-sm">
                                YouTube
                            </a>
                            <a href="#" class="px-5 py-2 rounded-full border border-gray-200 bg-white text-gray-700 text-xs font-bold hover:bg-gray-50 transition shadow-sm">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right: Form -->
                <div>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                        <h2 class="text-xl font-extrabold text-gray-800 mb-6">Kirim Pesan</h2>
                        
                        <form action="#" method="POST" class="space-y-5">
                            <div>
                                <label for="name" class="block text-xs font-bold text-gray-700 mb-1.5">Nama Lengkap</label>
                                <input type="text" id="name" name="name" placeholder="Nama Anda" class="w-full bg-[#FAFBFA] border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] placeholder-gray-400">
                            </div>

                            <div>
                                <label for="email" class="block text-xs font-bold text-gray-700 mb-1.5">Alamat Email</label>
                                <input type="email" id="email" name="email" placeholder="email@contoh.com" class="w-full bg-[#FAFBFA] border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] placeholder-gray-400">
                            </div>

                            <div>
                                <label for="subject" class="block text-xs font-bold text-gray-700 mb-1.5">Subjek</label>
                                <select id="subject" name="subject" class="w-full bg-[#FAFBFA] border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] text-gray-700">
                                    <option>Pertanyaan Umum</option>
                                    <option>Bantuan Tim Setor</option>
                                    <option>Kerja Sama Mitra</option>
                                    <option>Laporan Kendala</option>
                                </select>
                            </div>

                            <div>
                                <label for="message" class="block text-xs font-bold text-gray-700 mb-1.5">Pesan Anda</label>
                                <textarea id="message" name="message" rows="4" placeholder="Ceritakan yang bisa kami bantu..." class="w-full bg-[#FAFBFA] border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] placeholder-gray-400 resize-y"></textarea>
                            </div>

                            <button type="submit" class="w-full bg-[#3F6A28] hover:bg-[#345920] text-white font-bold py-3 rounded-lg shadow-md transition-colors mt-2">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- FAQ Section -->
            <div class="max-w-3xl mx-auto">
                <div class="text-center pb-10">
                    <span class="text-[11px] font-extrabold text-[#5A8D3F] tracking-[0.15em] uppercase block mb-3">FAQ</span>
                    <h2 class="text-3xl font-extrabold text-[#2C481A] mb-4 tracking-tight">Pertanyaan yang Sering Ditanyakan</h2>
                </div>

                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col p-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-extrabold text-gray-800 text-[15px]">Bagaimana cara daftar akun EcoBank?</h3>
                            <button class="text-gray-400 font-bold hover:text-gray-600 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                            </button>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Kamu bisa daftar lewat aplikasi atau website dengan email atau nomor WhatsApp. Verifikasi otomatis dan akunmu langsung aktif dalam 30 detik.
                        </p>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col p-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-extrabold text-gray-800 text-[15px]">Berapa lama proses pencairan saldo?</h3>
                            <button class="text-gray-400 font-bold hover:text-gray-600 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                            </button>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Pencairan saldo ke rekening bank biasanya memakan waktu 1-2 hari kerja. Untuk e-wallet (Gopay, OVO, Dana) proses instan.
                        </p>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col p-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-extrabold text-gray-800 text-[15px]">Apa saja jenis sampah yang diterima?</h3>
                            <button class="text-gray-400 font-bold hover:text-gray-600 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                            </button>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            EcoBank menerima plastik, kertas, logam, kaca, elektronik, dan tekstil. Sampah organik dan B3 (bahan berbahaya beracun) tidak kami terima untuk saat ini.
                        </p>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col p-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-extrabold text-gray-800 text-[15px]">Bagaimana cara menjadi mitra EcoPoint?</h3>
                            <button class="text-gray-400 font-bold hover:text-gray-600 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                            </button>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Isi formulir pendaftaran mitra di halaman Kontak atau email ke hi@ecobank.id. Tim kami akan menghubungi dalam 2x24 jam untuk proses verifikasi dan onboarding.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
