<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Kopi</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-center mb-8">🛒 Keranjang Kopi</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(empty($keranjang))

            <p class="text-center text-gray-500 mb-4">Keranjang kamu kosong.</p>

    <div class="text-center">
        <a href="{{ route('keranjang.index') }}" class="inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
            ← Kembali ke Keranjang
        </a>
    </div>
        @else
            <div class="space-y-6">
                @foreach($keranjang as $item)
                <div class="bg-white rounded-lg shadow-md p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        {{-- <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" class="w-20 h-20 object-cover rounded"> --}}
                        <div>
                            <h2 class="text-lg font-semibold">{{ $item['nama'] }}</h2>
                            <p class="text-gray-600">Jumlah: {{ $item['jumlah'] }}</p>
                            <p class="text-amber-700 font-bold">Rp{{ number_format($item['harga']) }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('keranjang.hapus', $item['id']) }}">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                @guest
                    <a href="{{ route('login.form') }}" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-900 transition">
                        Login untuk Checkout
                    </a>
                @else
                    @php
                        $role = Auth::user()->role;
                    @endphp

                    @if($role === 'customer')
                        <a href="{{ route('transaksi.create') }}" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                            Konfirmasi Pesanan
                        </a>
                    @elseif($role === 'karyawan')
                        <a href="{{ route('transaksi.index') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                            Kelola Transaksi
                        </a>
                    @else
                        <a href="{{ url('/home') }}" class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700 transition">
                            Halaman Utama
                        </a>
                    @endif
                @endguest
            </div>
        @endif
    </div>
</body>
</html>
