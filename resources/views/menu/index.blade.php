<link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
      @if(Auth::user()->role === 'karyawan')
        <a href="{{ route('menu.edit', $item->id) }}">Edit</a>
        <form method="POST" action="{{ route('menu.destroy', $item->id) }}" style="display:inline;">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Yakin mau hapus menu ini?')">Hapus</button>
        </form>
      @else
        <span style="color: gray;">-</span>
      @endif
    </td>
  </tr>
  @endforeach
</table>
