<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Kopi</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- ✅ Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-xl font-bold text-amber-700">Kopi Kenongo</div>
            <div class="space-x-4">
                <a href="{{ route('home.public') }}" class="text-gray-700 hover:text-amber-600">Home</a>
                <a href="{{ route('menu.index') }}" class="text-gray-700 hover:text-amber-600">Menu</a>
                <a href="{{ route('keranjang.index') }}" class="text-gray-700 hover:text-amber-600">Keranjang</a>

                @guest
                    <a href="{{ route('login.form') }}" class="text-gray-700 hover:text-amber-600">Login</a>
                @else
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- ✅ Konten Menu Kopi -->
    <div class="max-w-6xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-center mb-8">☕ Menu Kopi Publik</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($kopiList as $kopi)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $kopi->gambar }}" alt="{{ $kopi->nama }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $kopi->nama }}</h2>
                    <p class="text-sm text-gray-600 mt-1">{{ $kopi->deskripsi }}</p>
                    <p class="text-lg font-bold text-amber-700 mt-2">Rp{{ number_format($kopi->harga) }}</p>

                    <form method="POST" action="{{ route('keranjang.tambah', $kopi->id) }}" class="mt-4">
                        @csrf
                        <button type="submit" class="w-full bg-amber-600 text-white py-2 rounded hover:bg-amber-700 transition">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- ✅ Tombol ke Keranjang -->
        <div class="text-center mt-10">
            <a href="{{ route('keranjang.index') }}" class="inline-block bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                Lanjut ke Keranjang
            </a>
        </div>
    </div>
</body>
</html>
