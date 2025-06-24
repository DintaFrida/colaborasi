<x-public-layout>
    <div class="bg-blue-50 text-gray-800">

        {{-- Bagian Header yang dinamis --}}
        <header class="bg-blue-600 text-white py-6 text-center">
            <h1 class="text-3xl font-bold">Selamat Datang di {{ $faske->nama }}</h1>
            <p class="text-lg">Informasi dan Layanan {{ $faske->jenisFaskes->nama }} Lengkap</p>
        </header>

        {{-- ========================================================== --}}
        {{-- TAMPILKAN LAYANAN SPESIFIK BERDASARKAN JENIS FASKES --}}
        {{-- ========================================================== --}}

        @if ($faske->jenisFaskes->nama == 'Puskesmas')
            {{-- Tampilkan ini HANYA JIKA jenis faskesnya adalah Puskesmas --}}
            <section class="py-10 px-6 bg-white">
                <h2 class="text-2xl font-bold mb-8 text-center text-blue-700">Layanan Puskesmas</h2>
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4 max-w-6xl mx-auto">
                    <div class="bg-blue-100 p-6 rounded-xl shadow text-center">
                        <i class="fas fa-ambulance text-blue-600 text-4xl mb-4"></i>
                        <h3 class="font-semibold text-lg mb-2">Gawat Darurat (24 Jam)</h3>
                    </div>
                    <div class="bg-pink-100 p-6 rounded-xl shadow text-center">
                        <i class="fas fa-female text-pink-600 text-4xl mb-4"></i>
                        <h3 class="font-semibold text-lg mb-2">Kesehatan Ibu & Anak</h3>
                    </div>
                    <div class="bg-green-100 p-6 rounded-xl shadow text-center">
                        <i class="fas fa-tooth text-green-600 text-4xl mb-4"></i>
                        <h3 class="font-semibold text-lg mb-2">Kesehatan Gigi</h3>
                    </div>
                    <div class="bg-yellow-100 p-6 rounded-xl shadow text-center">
                        <i class="fas fa-user-md text-yellow-600 text-4xl mb-4"></i>
                        <h3 class="font-semibold text-lg mb-2">Layanan Umum</h3>
                    </div>
                </div>
            </section>

        @elseif ($faske->jenisFaskes->nama == 'Apotek')
            {{-- Tampilkan ini HANYA JIKA jenis faskesnya adalah Apotek --}}
            <section class="py-10 px-6 bg-white">
              <h2 class="text-2xl font-bold mb-8 text-center">Layanan Apotek</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
                <div class="bg-blue-100 p-6 rounded-xl shadow text-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 w-12 h-12 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m-6 4h12a2 2 0 002-2V5a2 2 0 00-2-2H6a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                  <h3 class="font-semibold text-lg">Obat Resep Dokter</h3>
                </div>
                <div class="bg-blue-100 p-6 rounded-xl shadow text-center">
                  <img src="https://img.icons8.com/ios-filled/50/pill.png" class="mx-auto mb-4 w-12 h-12" alt="Obat Bebas">
                  <h3 class="font-semibold text-lg">Obat Bebas & Herbal</h3>
                </div>
                <div class="bg-blue-100 p-6 rounded-xl shadow text-center">
                  <img src="https://img.icons8.com/ios-filled/50/consultation.png" class="mx-auto mb-4 w-12 h-12" alt="Konsultasi Farmasi">
                  <h3 class="font-semibold text-lg">Konsultasi Farmasi</h3>
                </div>
                <div class="bg-blue-100 p-6 rounded-xl shadow text-center">
                  <img src="https://img.icons8.com/ios-filled/50/health-book.png" class="mx-auto mb-4 w-12 h-12" alt="Penyuluhan Kesehatan">
                  <h3 class="font-semibold text-lg">Penyuluhan Kesehatan</h3>
                </div>
              </div>
            </section>
        @endif

        {{-- ========================================================== --}}
        {{--       BAGIAN UMUM (Tampil untuk semua jenis faskes)      --}}
        {{-- ========================================================== --}}

        <section class="py-10 px-6 bg-gray-50">
            <h2 class="text-2xl font-bold mb-8 text-center">Informasi & Kontak</h2>
            <div class="max-w-4xl mx-auto space-y-2 text-center">
                <p><strong>Alamat:</strong> {{ $faske->alamat }}</p>
                <p><strong>Website:</strong> <a href="{{ $faske->website }}" class="text-blue-600 underline" target="_blank">{{ $faske->website ?? '-' }}</a></p>
                <p><strong>Email:</strong> {{ $faske->email ?? '-' }}</p>
                <p><strong>Rating:</strong> {{ $faske->rating ?? 'N/A' }} / 5 ★</p>
            </div>
        </section>

        @if ($faske->latitude && $faske->longitude)
        <section class="py-10 px-6 bg-white">
            <h2 class="text-2xl font-bold mb-4 text-center">Lokasi</h2>
            <div class="mt-4 flex justify-center">
                <iframe
                    class="w-full max-w-4xl h-96"
                    style="border:0;"
                    loading="lazy"
                    allowfullscreen
                    src="https://maps.google.com/maps?q={{ $faske->latitude }},{{ $faske->longitude }}&hl=es&z=14&amp;output=embed">
                </iframe>
            </div>
        </section>
        @endif

    </div>
</x-public-layout>
