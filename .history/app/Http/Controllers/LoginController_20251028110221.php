<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaksi;
use App\Models\MenuKopi;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nama' =>  'required|string',
            'password' => 'required|string',
            'nohp' => 'required|string',
        ]);
        $credentials = $request->only('name','nohp', 'password');

          if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;

            if ($role === 'customer') {
                return redirect()->route('home.public')->with('success', 'Login berhasil! Silakan lanjut checkout.');
            } elseif ($role === 'karyawan') {
                return redirect()->route('transaksi.index')->with('success', 'Login sebagai karyawan.');
            }
             return redirect('/home');
        }

        return back()->withErrors([
            'nohp' => 'Login gagal. Cek nomor HP dan password.',
        ]);
    }

    public function home()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login.form')->withErrors(['auth' => 'Silakan login terlebih dahulu.']);
    }

    if ($user->role === 'customer') {
        $menu = MenuKopi::all();
        return view('home', compact('menu'));
    }

    if ($user->role === 'karyawan') {
        $menu = MenuKopi::all();
        $transaksi = Transaksi::with('menu')->latest()->get();
        return view('home', compact('menu', 'transaksi'));
    }

    return view('home');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
    }
}   
