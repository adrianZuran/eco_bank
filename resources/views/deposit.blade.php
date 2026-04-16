<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Setor Sampah ke Echo Bank</h2>
                
                <form action="{{ route('deposit.store') }}" method="POST" class="mb-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label>Jenis Sampah</label>
                            <select name="waste_category_id" class="w-full rounded border-gray-300">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }} (Rp {{ number_format($cat->price_per_kg) }}/kg)</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Berat (KG)</label>
                            <input type="number" step="0.1" name="weight" class="w-full rounded border-gray-300">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Kirim Setoran</button>
                        </div>
                    </div>
                </form>

                <hr>

                <h3 class="text-xl font-semibold mt-6 mb-2">Riwayat Setoran</h3>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border">Tanggal</th>
                            <th class="p-2 border">Kategori</th>
                            <th class="p-2 border">Berat</th>
                            <th class="p-2 border">Total Uang</th>
                            <th class="p-2 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($history as $h)
                        <tr>
                            <td class="p-2 border">{{ $h->created_at->format('d M Y') }}</td>
                            <td class="p-2 border">{{ $h->category->name ?? 'N/A' }}</td>
                            <td class="p-2 border">{{ $h->weight }} kg</td>
                            <td class="p-2 border">Rp {{ number_format($h->total_amount) }}</td>
                            <td class="p-2 border text-sm italic">{{ $h->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>