<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faskes App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <a href="{{ route('faskes.index') }}" class="text-2xl font-bold text-indigo-600">
                        FaskesFinder
                    </a>
                    <nav>
                        <a href="{{ route('faskes.index') }}" class="text-gray-600 hover:text-gray-900">Beranda</a>
                    </nav>
                </div>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>

        <footer class="bg-white mt-12 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500">
                <p>&copy; 2025 FaskesFinder. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
