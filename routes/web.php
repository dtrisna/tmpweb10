<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;


// Route::get('/', function () {
//     return view('login.login');
// });


// Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
// Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
// Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
// Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
// Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
// Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
// Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
// Route::resource('transaksi', TransaksiController::class);
// Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
// Route::view('/home', 'home')->name('home');
// Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
// Route::post('/login', [LoginController::class, 'login'])->name('login.process');
// Route::get('/home', [LoginController::class, 'home'])->minddleware('auth');
// Route::get('/logout', function () {
//     session()->forget('login');
//     return redirect()->route('login.form');
// })->name('logout');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [LoginController::class, 'home'])->middleware('auth')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    Route::resource('transaksi', TransaksiController::class);
    Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
});
