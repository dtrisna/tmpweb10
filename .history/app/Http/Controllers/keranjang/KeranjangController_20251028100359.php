<?php

namespace App\Http\Controllers\keranjang;

use App\Http\Controllers\Controller;
use App\Models\MenuKopi;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        return view('keranjang.index', compact('keranjang'));
    }

    public function tambah($id)
    {
        $kopi = MenuKopi::findOrFail($id);
        $keranjang = session()->get('keranjang', []);
        $keranjang[$id] = [
            'id' => $kopi->id,
            'nama' => $kopi->nama,
            'harga' => $kopi->harga,
            'gambar' => $kopi->gambar,
            'jumlah' => isset($keranjang[$id]) ? $keranjang[$id]['jumlah'] + 1 : 1,
        ];

        session()->put('keranjang', $keranjang);
        return redirect()->back()->with('success', 'Kopi ditambahkan ke keranjang!');
    }

    public function hapus($id)
    {
        $keranjang = session()->get('keranjang', []);
        unset($keranjang[$id]);
        session()->put('keranjang', $keranjang);

        return redirect()->route('keranjang.index')->with('success', 'Item dihapus dari keranjang.');
    }
}
