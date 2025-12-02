<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as ModelUser;

class User extends Component
{
    public $pilihanMenu = 'lihat';
    public $nama;
    public $email;
    public $peran;
    public $password;
    public $penggunaTerpilih;

    // PILIH EDIT
    public function pilihEdit($id)
    {
        $this->penggunaTerpilih = ModelUser::findOrFail($id);

        $this->nama  = $this->penggunaTerpilih->name;
        $this->email = $this->penggunaTerpilih->email;
        $this->peran = $this->penggunaTerpilih->peran;

        $this->pilihanMenu = 'edit';
    }

    // SIMPAN EDIT
    public function simpanEdit()
    {
        $this->validate([
            'nama'  => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $this->penggunaTerpilih->id],
            'peran' => 'required',
        ], [
            'nama.required'  => 'Nama Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'email.email'    => 'Format mesti Email',
            'email.unique'   => 'Email sudah digunakan',
            'peran.required' => 'Peran Harus Diisi',
        ]);

        $simpan = $this->penggunaTerpilih;

        $simpan->name  = $this->nama;
        $simpan->email = $this->email;
        $simpan->peran = $this->peran;

        if ($this->password) {
            $simpan->password = bcrypt($this->password);
        }

        $simpan->save();

        $this->reset(['nama', 'email', 'password', 'peran', 'penggunaTerpilih']);
        $this->pilihanMenu = 'lihat';
    }

    // PILIH HAPUS
    public function pilihHapus($id)
    {
        $this->penggunaTerpilih = ModelUser::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    // HAPUS
    public function hapus()
    {
        $this->penggunaTerpilih->delete();
        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    // BATAL
    public function batal()
    {
        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    // SIMPAN PENGGUNA BARU
    public function simpan()
    {
        $this->validate([
            'nama'     => 'required',
            'email'    => ['required', 'email', 'unique:users,email'],
            'peran'    => 'required',
            'password' => 'required',
        ], [
            'nama.required'     => 'Nama Harus Diisi',
            'email.required'    => 'Email Harus Diisi',
            'email.email'       => 'Format harus email',
            'email.unique'      => 'Email sudah digunakan',
            'peran.required'    => 'Peran Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);

        $simpan = new ModelUser();
        $simpan->name     = $this->nama;
        $simpan->email    = $this->email;
        $simpan->password = bcrypt($this->password);
        $simpan->peran    = $this->peran;
        $simpan->save();

        $this->reset(['nama', 'email', 'password', 'peran']);
        $this->pilihanMenu = 'lihat';
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function render()
    {
        return view('livewire.user')->with([
            'semuaPengguna' => ModelUser::all()
        ]);
    }
}
