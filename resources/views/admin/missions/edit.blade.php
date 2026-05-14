<x-admin-layout>
    <x-slot name="header">
        Edit Misi
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="mb-6 flex items-center gap-3">
            <a href="{{ route('admin.missions.index') }}" class="p-2 bg-white rounded-full shadow-sm hover:bg-gray-50 border border-gray-100 transition-colors text-gray-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="text-2xl font-extrabold text-gray-800">Detail Misi</h2>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
            <form action="{{ route('admin.missions.update', $mission->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Judul Misi <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $mission->title) }}" required class="w-full rounded-xl border-gray-300 focus:border-[#5C8D3A] focus:ring focus:ring-[#5C8D3A]/20 transition-shadow">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Misi</label>
                        <textarea name="description" id="description" rows="3" class="w-full rounded-xl border-gray-300 focus:border-[#5C8D3A] focus:ring focus:ring-[#5C8D3A]/20 transition-shadow">{{ old('description', $mission->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="reward_points" class="block text-sm font-bold text-gray-700 mb-2">Hadiah Poin <span class="text-red-500">*</span></label>
                        <input type="number" name="reward_points" id="reward_points" value="{{ old('reward_points', $mission->reward_points) }}" min="0" required class="w-full rounded-xl border-gray-300 focus:border-[#5C8D3A] focus:ring focus:ring-[#5C8D3A]/20 transition-shadow">
                        @error('reward_points')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $mission->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-[#5C8D3A] shadow-sm focus:ring-[#5C8D3A] w-5 h-5">
                        <label for="is_active" class="ml-3 block text-sm font-bold text-gray-700">Misi Aktif</label>
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3 pt-6 border-t border-gray-100">
                    <a href="{{ route('admin.missions.index') }}" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-xl text-sm font-bold hover:bg-gray-50 transition-colors">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-[#5C8D3A] hover:bg-[#4A7F2F] text-white rounded-xl text-sm font-bold shadow-md transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
