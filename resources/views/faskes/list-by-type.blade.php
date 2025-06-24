<x-public-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Judul dinamis sesuai jenis faskes --}}
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Daftar {{ $jenisFaskes->nama }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($listFaskes as $faske)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900">{{ $faske->nama }}</h3>
                            <p class="mt-2 text-gray-600">{{ $faske->alamat }}</p>
                            <div class="mt-4 flex items-center">
                                <span class="text-yellow-500">★</span>
                                <span class="ml-1 text-gray-600">{{ $faske->rating ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="px-6 pb-4 bg-gray-50">
                             {{-- Link ini akan menuju ke halaman detail faskes --}}
                             <a href="{{ route('faskes.show', $faske->id) }}" class="block w-full text-center bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-600 transition duration-300">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center col-span-full text-gray-500">Belum ada data untuk jenis faskes ini.</p>
                @endforelse
            </div>

            <div class="mt-10">
                {{ $listFaskes->links() }}
            </div>
        </div>
    </div>

</x-public-layout>
