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

        <!-- Tombol Tambah Menu & Logout -->
        <div class="flex justify-end items-center gap-4 mb-6">
            <a href="{{ route('menu.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow-sm">
                + Tambah Menu
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded shadow-sm">
                    Logout
                </button>
            </form>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($menu as $kopi)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition hover:shadow-lg">
                <div class="p-4">
                    @if($kopi->gambar)
                        <img src="{{ asset('storage/uploads/' . $kopi->gambar) }}" alt="{{ $kopi->nama }}" class="w-full h-48 object-cover rounded-t">


                    @endif

                    <h2 class="text-xl font-semibold text-gray-800">{{ $kopi->nama }}</h2>
                    <p class="text-sm text-gray-600 mt-1">Kategori: {{ $kopi->kategori }}</p>
                    <p class="text-lg font-bold text-amber-700 mt-2">Rp{{ number_format($kopi->harga) }}</p>

                    <!-- Tombol Edit & Hapus -->
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('menu.edit', $kopi->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium py-1 px-3 rounded shadow-sm">
                            Edit
                        </a>

                        <form action="{{ route('menu.destroy', $kopi->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus menu ini?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-1 px-3 rounded shadow-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
