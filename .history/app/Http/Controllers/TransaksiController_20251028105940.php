<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\MenuKopi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class TransaksiController extends Controller
{

    public function index()
    {
        if (Auth::user()->role !== 'karyawan') {
        abort(403, 'Akses hanya untuk karyawan.');
        }

        $transaksi = Transaksi::with('menu')->latest()->get();
        return view('transaksi.index', compact('transaksi'));
    }

    // public function create()
    // {
    //     $menu = MenuKopi::all();
    //     return view('transaksi.create', compact('menu'));
    // }


    public function create()
    {
    $user = Auth::user();
    $tanggal_pesan = Carbon::now()->toDateString();
    $waktu_pesan = Carbon::now()->format('H:i:s');

    $keranjang = session()->get('keranjang', []);

    return view('transaksi.konfirmasi', compact('user', 'tanggal_pesan', 'waktu_pesan', 'keranjang'));
    }


    public function store(Request $request)
{
    $user = Auth::user();
    $keranjang = session()->get('keranjang', []);

    foreach ($keranjang as $item) {
        Transaksi::create([
    'user_id' => $user->id,
    'nama_pemesan' => $user->name,
    'nohp_pemesan' => $user->nohp,
    'menu_id' => $item['id'],
    'jumlah' => $item['jumlah'],
    'harga' => $item['harga'],
    'tanggal_pesan' => $request->tanggal_pesan,
    'waktu_pesan' => $request->waktu_pesan,
]);
    }

    session()->forget('keranjang');

    return redirect()->route('keranjang.index')->with('success', 'Pesanan berhasil dikirim!');
}



    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
