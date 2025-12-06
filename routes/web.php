<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\livewire\Beranda;
use App\livewire\Laporan;
use App\livewire\Produk;
use App\livewire\Transaksi;
use App\livewire\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', Beranda::class)->middleware('auth')->name('home');
Route::get('/user', User::class)->middleware('auth')->name('user');
Route::get('/produk', Produk::class)->middleware('auth')->name('produk');
Route::get('/transaksi', Transaksi::class)->middleware('auth')->name('transaksi');
Route::get('/laporan', Laporan::class)->middleware('auth')->name('laporan');
Route::get('/cetak', [App\Http\Controllers\HomeController::class, 'cetak'])->middleware('auth')->name('cetak');
Route::get('/beranda', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda')->middleware('auth');
