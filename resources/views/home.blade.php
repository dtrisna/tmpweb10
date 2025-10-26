<!-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Selamat Datang di Dashboard CRUD Menu Kopi</h2>
    <p>Pilih metode yang ingin kamu gunakan:</p>

    <div style="margin-top: 20px;">
        <a href="{{ url('/menu') }}">🔗 Lihat dengan ORM</a><br><br>
        <a href="{{ route('transaksi.index') }}">🔗 Lihat Daftar Pemesanan</a><br><br>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
    <p>Anda login sebagai: <strong>{{ Auth::user()->role }}</strong></p>

    @if (Auth::user()->role === 'customer')
        {{-- Tampilan untuk customer --}}
        <h2>Daftar Menu Kopi</h2>
        <table>
            <tr><th>Nama</th><th>Harga</th><th>Kategori</th></tr>
            @foreach($menu as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->kategori }}</td>
            </tr>
            @endforeach
        </table>

        <a href="{{ route('transaksi.create') }}">Pesan Kopi</a>

    @elseif (Auth::user()->role === 'karyawan')
        {{-- Tampilan untuk karyawan --}}
        <h2>Riwayat Transaksi</h2>
        <table>
            <tr><th>Menu</th><th>Nama Pemesan</th><th>No HP</th><th>Tanggal</th><th>Waktu</th></tr>
            @foreach($transaksi as $trx)
            <tr>
                <td>{{ $trx->menu->nama }}</td>
                <td>{{ $trx->nama_pemesan }}</td>
                <td>{{ $trx->nohp_pemesan }}</td>
                <td>{{ $trx->tanggal_pesan }}</td>
                <td>{{ $trx->waktu_pesan }}</td>
            </tr>
            @endforeach
        </table>

        <h2>Daftar Menu Kopi</h2>
        <a href="{{ route('menu.create') }}">Tambah Menu</a>
        <table>
            <tr><th>Nama</th><th>Harga</th><th>Kategori</th><th>Aksi</th></tr>
            @foreach($menu as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->kategori }}</td>
                <td>
                    <a href="{{ route('menu.edit', $item->id) }}">Edit</a>
                    <form method="POST" action="{{ route('menu.destroy', $item->id) }}">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin mau hapus menu ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
