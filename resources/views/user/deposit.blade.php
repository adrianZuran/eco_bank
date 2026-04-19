<x-app-layout>
    <div class="py-10 bg-[#FAFBFA] min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="text-center pt-4 pb-10">
                <div class="inline-flex items-center justify-center gap-2 mb-3">
                    <span class="text-xs font-bold text-[#4A7F2F] tracking-widest uppercase">Transaksi Baru</span>
                </div>
                <div class="flex items-center justify-center gap-3">
                    <h1 class="text-4xl font-extrabold text-[#2C481A]">Jual Sampah</h1>
                    <span class="bg-[#FBE8B3] text-[#A67B27] text-xs font-extrabold px-2.5 py-1 rounded-md">BETA</span>
                </div>
                <p class="mt-3 text-gray-500 font-medium">Isi formulir berikut untuk mendaftarkan setoranmu.</p>
            </div>

            <!-- Alert if success -->
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            <!-- Form -->
            <form action="{{ route('deposit.store') }}" method="POST">
                @csrf
                
                <!-- Hidden inputs default for functionality testing based on original controller -->
                <input type="hidden" name="waste_category_id" value="{{ $categories->first()->id ?? 1 }}">
                <input type="hidden" name="weight" value="1">

                <!-- 1. Informasi Personal -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 mb-6 shadow-sm border border-gray-100/80">
                    <h2 class="text-[1.15rem] font-extrabold text-[#2C481A] flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#BDE8A5] text-[#3F6A28] bg-[#F2F7EF] text-sm font-bold">1</span>
                        Informasi Personal
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="md:col-span-2">
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" value="{{ auth()->user() ? auth()->user()->name : '' }}" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                            <input type="email" value="{{ auth()->user() ? auth()->user()->email : '' }}" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm" placeholder="email@contoh.com">
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Nomor WhatsApp <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm" placeholder="0812...">
                        </div>
                    </div>
                    <div class="flex items-center mt-6">
                        <input type="checkbox" id="save_details" class="w-4 h-4 text-[#4A7F2F] border-gray-300 rounded focus:ring-[#4A7F2F] cursor-pointer">
                        <label for="save_details" class="ml-2.5 text-[13.5px] font-medium text-gray-500 cursor-pointer select-none">Simpan detail saya untuk transaksi berikutnya</label>
                    </div>
                </div>

                <!-- 2. Alamat Penjemputan -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 mb-6 shadow-sm border border-gray-100/80">
                    <h2 class="text-[1.15rem] font-extrabold text-[#2C481A] flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#BDE8A5] text-[#3F6A28] bg-[#F2F7EF] text-sm font-bold">2</span>
                        Alamat Penjemputan
                    </h2>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Jenis Pengiriman <span class="text-red-500">*</span></label>
                            <select class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%239CA3AF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E')] bg-[length:10px_10px] bg-[position:right_1rem_center] bg-no-repeat pr-10">
                                <option>Antar Sendiri ke EcoPoint</option>
                                <option>Penjemputan / Pickup</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Alamat Lengkap <span class="text-red-500">*</span></label>
                            <textarea class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-3 text-sm h-28 resize-y" placeholder="Nama Jalan, No. Rumah, RT/RW, Kecamatan..."></textarea>
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Pilih Cabang EcoPoint <span class="text-red-500">*</span></label>
                            <select class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%239CA3AF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E')] bg-[length:10px_10px] bg-[position:right_1rem_center] bg-no-repeat pr-10">
                                <option>Pilih EcoPoint Terdekat</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Jadwal Setor <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="datetime-local" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Detail Sampah -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 mb-6 shadow-sm border border-gray-100/80">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-[1.15rem] font-extrabold text-[#2C481A] flex items-center gap-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#BDE8A5] text-[#3F6A28] bg-[#F2F7EF] text-sm font-bold">3</span>
                            Detail Sampah
                        </h2>
                        <button type="button" class="text-xs font-bold text-[#4A7F2F] border border-[#BDE8A5] bg-[#F8FCF5] rounded-full px-4 py-2 hover:bg-[#F2F7EF] transition flex items-center gap-1.5">
                            <span class="text-lg leading-none">+</span> Tambah Item
                        </button>
                    </div>
                    
                    <div class="border-[1.5px] border-dashed border-gray-200 bg-[#FCFDFB] rounded-2xl p-8 text-center mb-4 flex flex-col items-center justify-center">
                        <div class="mb-3 text-[#5A734D] opacity-60">
                            <!-- Custom Bag Icon -->
                            <svg class="w-10 h-10 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 6h-2c0-2.8-2.2-5-5-5S7 3.2 7 6H5c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-7-3c1.7 0 3 1.3 3 3H9c0-1.7 1.3-3 3-3zm7 17H5V8h14v12z"/>
                                <path d="M9 10v2h6v-2z"/>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-sm mb-1.5 font-medium">Belum ada sampah yang ditambahkan.</p>
                        <button type="button" class="text-[#3F6A28] text-sm font-extrabold hover:underline rounded focus:outline-none">+ Tambah dari katalog</button>
                    </div>

                    <div class="border-[1.5px] border-dashed border-gray-200 bg-[#FCFDFB] rounded-2xl p-8 text-center flex flex-col items-center justify-center cursor-pointer hover:bg-gray-50 transition">
                        <div class="mb-3 text-[#3F6A28]">
                            <svg class="w-10 h-10 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.35 10.04A7.49 7.49 0 0012 4C9.11 4 6.6 5.64 5.35 8.04A5.994 5.994 0 000 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z"/>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-[13.5px]"><span class="font-extrabold text-[#3F6A28]">Klik untuk upload</span> atau drag & drop foto sampah</p>
                        <p class="text-[#A4B39B] text-xs mt-1.5 font-medium">Gunakan kamera atau galeri • JPG, PNG maks. 10MB</p>
                    </div>
                </div>

                <!-- 4. Catatan Tambahan -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 mb-8 shadow-sm border border-gray-100/80">
                    <h2 class="text-[1.15rem] font-extrabold text-[#2C481A] flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#BDE8A5] text-[#3F6A28] bg-[#F2F7EF] text-sm font-bold">4</span>
                        Catatan Tambahan <span class="text-gray-400 font-medium text-[13px] ml-[-4px]">(opsional)</span>
                    </h2>
                    <div>
                        <textarea class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-3 text-sm h-24 resize-y" placeholder="Contoh: Sampah sudah dipisah per jenis, plastik dalam karung..."></textarea>
                    </div>
                </div>

                <div class="pb-12 text-center">
                    <button type="submit" class="w-full bg-[#3F6A28] text-white font-extrabold text-base py-4 rounded-xl hover:bg-[#345920] shadow-[0_8px_20px_-6px_rgba(63,106,40,0.4)] transition flex justify-center items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Ajukan Setoran Sampah
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>