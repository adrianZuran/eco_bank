<x-admin-layout>
    <x-slot name="header">
        {{ isset($product) ? 'Edit Produk Sampah' : 'Tambah Produk Baru' }}
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                <h3 class="text-lg font-bold text-gray-800">
                    {{ isset($product) ? 'Form Edit Produk' : 'Form Produk Baru' }}
                </h3>
            </div>

            <div class="p-6">
                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ isset($product) ? route('admin.catalog.update', $product->id) : route('admin.catalog.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @if(isset($product))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <!-- Category Dropdown -->
                        <div>
                            <label for="category" class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Kategori Utama</label>
                            <select id="category" name="category" required class="w-full bg-[#FAFBFA] border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] text-gray-800">
                                <option value="" disabled {{ !isset($product) ? 'selected' : '' }}>Pilih Kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ (old('category', $product->category ?? '') == $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sub Category -->
                        <div>
                            <label for="sub_category" class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Sub Kategori (Opsional)</label>
                            <input type="text" id="sub_category" name="sub_category" value="{{ old('sub_category', $product->sub_category ?? '') }}" placeholder="Contoh: PET, HDPE, Kertas Bekas" class="w-full bg-[#FAFBFA] border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] placeholder-gray-400">
                        </div>

                        <!-- Name -->
                        <div class="sm:col-span-2">
                            <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Nama Produk / Jenis Sampah</label>
                            <input type="text" id="name" name="name" required value="{{ old('name', $product->name ?? '') }}" placeholder="Contoh: Botol PET Bening" class="w-full bg-[#FAFBFA] border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] placeholder-gray-400">
                        </div>

                        <!-- Price -->
                        <div class="sm:col-span-2">
                            <label for="price_per_kg" class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Harga per KG (Rp)</label>
                            <input type="number" id="price_per_kg" name="price_per_kg" required min="0" value="{{ old('price_per_kg', $product->price_per_kg ?? '') }}" placeholder="Contoh: 2500" class="w-full bg-[#FAFBFA] border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] placeholder-gray-400">
                        </div>

                        <!-- Trend Dropdown -->
                        <div>
                            <label for="trend" class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Trend Harga</label>
                            <select id="trend" name="trend" required class="w-full bg-[#FAFBFA] border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] text-gray-800">
                                @foreach($trends as $value => $label)
                                    <option value="{{ $value }}" {{ (old('trend', $product->trend ?? 'stabil') == $value) ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Trend Amount -->
                        <div>
                            <label for="trend_amount" class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Angka Trend (Opsional)</label>
                            <input type="text" id="trend_amount" name="trend_amount" value="{{ old('trend_amount', $product->trend_amount ?? '') }}" placeholder="Contoh: +Rp 200, -Rp 100" class="w-full bg-[#FAFBFA] border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-[#4A7F2F] focus:border-[#4A7F2F] placeholder-gray-400">
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6 mt-6 border-t border-gray-100">
                        <a href="{{ route('admin.catalog.index') }}" class="px-6 py-3 text-sm font-bold text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors shadow-sm">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-3 text-sm font-bold text-white bg-[#5C8D3A] rounded-xl hover:bg-[#4A7F2F] transition-colors shadow-md">
                            {{ isset($product) ? 'Simpan Perubahan' : 'Tambah Produk' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
