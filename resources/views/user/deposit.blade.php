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
                
                <!-- Removed hardcoded hidden inputs -->

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
                            <select name="shipping_type" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%239CA3AF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E')] bg-[length:10px_10px] bg-[position:right_1rem_center] bg-no-repeat pr-10">
                                <option value="Antar Sendiri ke EcoPoint">Antar Sendiri ke EcoPoint</option>
                                <option value="Penjemputan / Pickup">Penjemputan / Pickup</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Alamat Lengkap <span class="text-red-500">*</span></label>
                            <textarea name="address" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-3 text-sm h-28 resize-y" placeholder="Nama Jalan, No. Rumah, RT/RW, Kecamatan..."></textarea>
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Pilih Cabang EcoPoint <span class="text-red-500">*</span></label>
                            <select name="ecopoint_branch" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%239CA3AF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E')] bg-[length:10px_10px] bg-[position:right_1rem_center] bg-no-repeat pr-10">
                                <option value="">Pilih EcoPoint Terdekat</option>
                                <option value="Cabang Pusat">Cabang Pusat</option>
                                <option value="Cabang Utara">Cabang Utara</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Jadwal Setor <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="datetime-local" name="pickup_date" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Detail Sampah -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 mb-6 shadow-sm border border-gray-100/80">
                    <h2 class="text-[1.15rem] font-extrabold text-[#2C481A] flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#BDE8A5] text-[#3F6A28] bg-[#F2F7EF] text-sm font-bold">3</span>
                        Detail Sampah
                    </h2>
                    
                    <div class="space-y-5">
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Jenis Sampah <span class="text-red-500">*</span></label>
                            <select id="waste_category" name="waste_category_id" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%239CA3AF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E')] bg-[length:10px_10px] bg-[position:right_1rem_center] bg-no-repeat pr-10" onchange="calculateTotal()" required>
                                <option value="" disabled selected>Pilih Jenis Sampah</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" data-price="{{ $cat->price_per_kg }}">{{ $cat->name }} - Rp {{ number_format($cat->price_per_kg, 0, ',', '.') }}/kg</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Perkiraan Berat <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="number" id="weight" name="weight" step="0.1" min="0.1" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-2.5 text-sm" placeholder="Contoh: 1.5" onkeyup="calculateTotal()" onchange="calculateTotal()" required>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400 font-bold text-sm">
                                    Kg
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#F8FCF5] border border-[#BDE8A5] rounded-xl p-4 mt-4 flex justify-between items-center">
                            <span class="text-[13px] font-bold text-[#3F6A28]">Estimasi Pendapatan</span>
                            <span id="estimated_total" class="text-lg font-extrabold text-[#2C481A]">Rp 0</span>
                        </div>
                    </div>
                </div>

                <!-- 4. Catatan Tambahan -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 mb-8 shadow-sm border border-gray-100/80">
                    <h2 class="text-[1.15rem] font-extrabold text-[#2C481A] flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#BDE8A5] text-[#3F6A28] bg-[#F2F7EF] text-sm font-bold">4</span>
                        Catatan Tambahan <span class="text-gray-400 font-medium text-[13px] ml-[-4px]">(opsional)</span>
                    </h2>
                    <div>
                        <textarea name="notes" class="w-full border-gray-200 rounded-xl focus:ring-[#4A7F2F] focus:border-[#4A7F2F] bg-gray-50 text-gray-700 px-4 py-3 text-sm h-24 resize-y" placeholder="Contoh: Sampah sudah dipisah per jenis, plastik dalam karung..."></textarea>
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

    <!-- Script for Dynamic Calculation -->
    <script>
        function calculateTotal() {
            const select = document.getElementById('waste_category');
            const weightInput = document.getElementById('weight');
            const totalDisplay = document.getElementById('estimated_total');

            if (select.selectedIndex && weightInput.value) {
                const option = select.options[select.selectedIndex];
                const pricePerKg = option.getAttribute('data-price');
                const weight = parseFloat(weightInput.value);

                if (pricePerKg && weight > 0) {
                    const total = pricePerKg * weight;
                    totalDisplay.innerText = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(total);
                    return;
                }
            }
            
            totalDisplay.innerText = 'Rp 0';
        }
    </script>
</x-app-layout>