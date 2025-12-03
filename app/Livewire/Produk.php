<?php

namespace App\Livewire;

use App\Models\Produk as ModelProduk;
use Livewire\Component;

class Produk extends Component
{
    public $pilihanMenu = 'lihat';
    public $nama;
    public $kode;
    public $harga;
    public $stok;
    public $produkTerpilih;

    public function pilihMenu($menu)
    {
        $this->resetExcept('pilihanMenu');
        $this->pilihanMenu = $menu;
    }

    public function pilihEdit($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);

        $this->nama  = $this->produkTerpilih->nama;
        $this->kode  = $this->produkTerpilih->kode;
        $this->harga = $this->produkTerpilih->harga;
        $this->stok  = $this->produkTerpilih->stok;

        $this->pilihanMenu = 'edit';
    }

    public function simpanEdit()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => 'required|unique:produks,kode,' . $this->produkTerpilih->id,
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $produk = $this->produkTerpilih;
        $produk->nama = $this->nama;
        $produk->kode = $this->kode;
        $produk->harga = $this->harga;
        $produk->stok = $this->stok;
        $produk->save();

        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    public function pilihHapus($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function hapus()
    {
        $this->produkTerpilih->delete();
        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    public function batal()
    {
        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => 'required|unique:produks,kode',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $produk = new ModelProduk();
        $produk->nama = $this->nama;
        $produk->kode = $this->kode;
        $produk->harga = $this->harga;
        $produk->stok  = $this->stok;
        $produk->save();

        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    public function render()
    {
        return view('livewire.produk', [
            'semuaProduk' => ModelProduk::all()
        ]);
    }
}
