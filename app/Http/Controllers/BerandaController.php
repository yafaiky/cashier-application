<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;

class BerandaController extends Controller
{
    public function index()
    {
        return view('beranda', [
            'totalProduk' => Produk::count(),
            'transaksiHariIni' => Transaksi::whereDate('created_at', today())->count(),
            'pendapatanHariIni' => Transaksi::whereDate('created_at', today())->sum('total'),
        ]);
    }
}
