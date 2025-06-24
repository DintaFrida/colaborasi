<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Portal Fasilitas Kesehatan</title>

  {{-- Tambahkan style ini untuk x-cloak --}}
  <style>
    [x-cloak] { display: none !important; }
  </style>

  {{-- Script Alpine.js dipindah ke head dengan defer --}}
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-50">
  <!-- Header -->
  <header class="bg-blue-600 sticky top-0 z-50 shadow-md">
    <nav class="text-white container mx-auto py-4 px-6 flex justify-between items-center">
      <a href="/" class="text-3xl md:text-4xl text-white font-bold">FaskesFinder</a>

      <!-- Menu Utama -->
      <ul class="hidden md:flex items-center space-x-6">
        <li><a href="#home" class="hover:text-gray-200">Home</a></li>
        <li><a href="#tingkat" class="hover:text-gray-200">Jenis Faskes</a></li>
        <li><a href="#about" class="hover:text-gray-200">About</a></li>
        <li><a href="#contact" class="hover:text-gray-200">Contact</a></li>

        @auth
            {{-- Dropdown Profil --}}
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>

                {{-- Menu Dropdown dengan x-cloak --}}
                <div x-show="open"
                     x-cloak
                     @click.away="open = false"
                     x-transition
                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 text-gray-700 z-50">

                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Profil Saya</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                            Keluar
                        </a>
                    </form>
                </div>
            </div>
        @else
            {{-- Tombol Login jika belum masuk --}}
            <li><a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-2 rounded-md hover:bg-gray-200">Login</a></li>
        @endauth
      </ul>

      <button class="hamburger-menu text-2xl md:hidden">
        <i class="fa-solid fa-bars"></i>
      </button>
    </nav>
  </header>

  <!-- Hero Section -->
  <section id="home" class="bg-blue-600 min-h-screen flex items-center">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
      <div class="text-center md:text-left md:w-1/2">
        <h1 class="text-4xl md:text-5xl text-white font-bold mb-4 leading-tight">Fasilitas Kesehatan <br><span class="text-white font-extrabold">KOTA JAKARTA</span></h1>
        <p class="text-lg text-white mb-6">Kami hadir untuk memudahkan Anda mengakses berbagai layanan kesehatan seperti Puskesmas, Rumah Sakit, dan Apotek secara cepat dan akurat. Cukup dalam satu platform, Anda bisa mencari fasilitas kesehatan terdekat dan melihat informasi layanannya.</p>
      </div>
      <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
        <img src="{{ asset('img/dokter.jpeg') }}" alt="Dokter Profesional" class="w-full max-w-md rounded-lg shadow-2xl">
      </div>
    </div>
  </section>

  <!-- Jenis Faskes Section -->
<section id="tingkat" class="py-20 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Jenis Fasilitas Kesehatan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse ($allJenisFaskes as $jenis)
            <div class="bg-white p-8 rounded-lg shadow-md text-center transition-transform transform hover:-translate-y-2">
                {{-- Wadah gambar --}}
                <div class="flex items-center justify-center h-48 mb-6">
                    <img src="{{ asset('img/' . Str::slug($jenis->nama) . '.jpeg') }}"
                         onerror="this.onerror=null;this.src='https://placehold.co/400x300/e2e8f0/4a5568?text=Gambar+Tidak+Tersedia';"
                         alt="{{ $jenis->nama }}"
                         class="max-h-full max-w-full object-contain">
                </div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">{{ $jenis->nama }}</h3>
                <p class="text-gray-600 mb-6 h-16">
                    @if($jenis->nama == 'Puskesmas')
                        Fasilitas kesehatan dasar yang memberikan layanan primer kepada masyarakat.
                    @elseif($jenis->nama == 'Rumah Sakit')
                        Memberikan layanan kesehatan tingkat lanjut dan perawatan khusus.
                    @elseif($jenis->nama == 'Apotek')
                        Menyediakan obat-obatan dan layanan farmasi untuk masyarakat umum.
                    @else
                        Layanan kesehatan untuk kategori {{ strtolower($jenis->nama) }}.
                    @endif
                </p>
                <a href="{{ route('faskes.by_type', $jenis) }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300 inline-block">
                    Lihat Daftar
                </a>
            </div>
            @empty
            <p class="text-center col-span-full text-gray-500">Data jenis faskes tidak ditemukan. Silakan tambahkan melalui panel admin.</p>
            @endforelse

        </div>
    </div>
</section>


  <!-- About Section -->
  <section id="about" class="py-20 bg-gray-100">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold mb-4">Tentang Kami</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">Kami adalah platform informasi kesehatan yang menyediakan data fasilitas kesehatan berdasarkan tingkat layanan. Kami berkomitmen untuk membantu masyarakat mengakses layanan kesehatan secara cepat dan tepat.</p>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold mb-4">Hubungi Kami</h2>
      <p class="text-gray-600 mb-6">Untuk pertanyaan lebih lanjut, silakan hubungi kami melalui media sosial berikut:</p>
      <div class="flex justify-center space-x-6 text-2xl">
        <a href="#" class="text-blue-600"><i class="fa-brands fa-facebook"></i></a>
        <a href="#" class="text-pink-500"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="text-sky-500"><i class="fa-brands fa-twitter"></i></a>
        <a href="#" class="text-red-600"><i class="fa-brands fa-youtube"></i></a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-blue-600 text-white text-center py-4">
    <p>&copy; {{ date('Y') }} FaskesFinder. </p>
  </footer>

</body>
</html>
