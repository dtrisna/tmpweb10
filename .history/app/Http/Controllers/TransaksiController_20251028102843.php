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

    public function create()
    {
        $menu = MenuKopi::all();
        return view('transaksi.create', compact('menu'));
    }


    public function store(Request $request)
    {
         if (Auth::user()->role !== 'customer') {
        abort(403, 'Akses hanya untuk customer.');
        }

        $request->validate([
        'menu_id' => 'required|exists:menu_kopi,id',
        'nama_pemesan' => 'required|string|max:100',
        'nohp_pemesan' => 'required|string|max:20',
        'tanggal_pesan' => 'required|date',
        'waktu_pesan' => 'required',]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Pemesanan berhasil disimpan!');
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
