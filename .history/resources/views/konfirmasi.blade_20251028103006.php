<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pesanan</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-center mb-6">🧾 Konfirmasi Pesanan</h1>

        <div class="bg-white p-6 rounded shadow mb-6">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Nomor HP:</strong> {{ $user->nohp }}</p>
            <p><strong>Tanggal Pesan:</strong> {{ $tanggal_pesan }}</p>
            <p><strong>Waktu Pesan:</strong> {{ $waktu_pesan }}</p>
        </div>

        <h2 class="text-xl font-semibold mb-4">🛒 Menu yang Dipesan</h2>
        <div class="space-y-4">
            @foreach($keranjang as $item)
                <div class="bg-white p-4 rounded shadow flex justify-between items-center">
                    <div>
                        <p class="font-semibold">{{ $item['nama'] }}</p>
                        <p>Jumlah: {{ $item['jumlah'] }}</p>
                        <p class="text-amber-700 font-bold">Rp{{ number_format($item['harga']) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <form method="POST" action="{{ route('transaksi.store') }}" class="mt-8">
            @csrf
            <input type="hidden" name="tanggal_pesan" value="{{ $tanggal_pesan }}">
            <input type="hidden" name="waktu_pesan" value="{{ $waktu_pesan }}">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                Checkout Sekarang
            </button>
        </form>
    </div>
</body>
</html>
