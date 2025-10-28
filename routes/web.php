<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\keranjang\KeranjangController;

// Halaman publik
Route::get('/', [HomeController::class, 'index'])->name('home.public');

// Login & Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman setelah login (tanpa middleware)
Route::get('/home', [LoginController::class, 'home'])->middleware('auth')->name('home');

// Menu & Transaksi (akses bebas)
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::get('/checkout', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

Route::resource('transaksi', TransaksiController::class);
Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');

Route::post('/accept-cookie', [HomeController::class, 'acceptCookie'])->name('cookie.accept');



Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
