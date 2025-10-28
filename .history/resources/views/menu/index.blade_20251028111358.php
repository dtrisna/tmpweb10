<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Kopi</title>
    @vite('resources/css/app.css') <!-- Tailwind aktif -->
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-6xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-center mb-8">☕ Menu Kopi</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($menu as $kopi)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $kopi->nama }}</h2>
                    <p class="text-sm text-gray-600 mt-1">Kategori: {{ $kopi->kategori }}</p>
                    <p class="text-lg font-bold text-amber-700 mt-2">Rp{{ number_format($kopi->harga) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
