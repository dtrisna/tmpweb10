<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuKopi;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class MenuController extends Controller
{

public function index() {
    $menu = MenuKopi::with('transaksi')->get();
    return view('menu.index', compact('menu'));
}


public function store(Request $request)
{
    if (Auth::user()->role !== 'karyawan') {
        abort(403, 'Akses hanya untuk karyawan.');
    }
    $request->validate([
        'nama' => 'required|string|max:100',
        'harga' => 'required|integer|min:0',
        'kategori' => 'nullable|string|max:50',
        'tersedia' => 'required|boolean',
    ]);
    MenuKopi::create([
        'nama' => $request->nama,
        'kategori' => $request->kategori,
        'harga' => $request->harga,
        'tersedia' => $request->tersedia,
    ]);


    return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
}

    public function create()
{
    if (Auth::user()->role !== 'karyawan') {
        abort(403, 'Akses hanya untuk karyawan.');
    }
    return view('menu.create');
}


    public function show(string $id)
    {
        //
    }


    public function edit($id)
{
    if (Auth::user()->role !== 'karyawan') {
        abort(403, 'Akses hanya untuk karyawan.');
    }
    $menu = MenuKopi::findOrFail($id);
    return view('menu.edit', compact('menu'));
}



    public function update(Request $request, $id)
{
    if (Auth::user()->role !== 'karyawan') {
        abort(403, 'Akses hanya untuk karyawan.');
    }

    $request->validate([
        'nama' => 'required|string|max:100',
        'harga' => 'required|integer|min:0',
        'kategori' => 'nullable|string|max:50',
        'tersedia' => 'required|boolean',
    ]);

    $menu = MenuKopi::findOrFail($id);
    $menu->update([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'kategori' => $request->kategori,
        'tersedia' => $request->tersedia,
    ]);

    return redirect()->route('menu.index')->with('success', 'Menu berhasil diupdate!');
}



c

}
