<link rel="stylesheet" href="{{ asset('css/style.css') }}">


<h2>Daftar Transaksi</h2>

<a href="{{ route('menu.index') }}" class="btn btn-primary mb-3">
    Kelola Menu
</a>

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
