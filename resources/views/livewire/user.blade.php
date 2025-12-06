<div>
    <div class="container">

        {{-- MENU BUTTONS --}}
        <div class="row my-3">
            <div class="col-12 d-flex gap-2">

                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Lihat Pengguna
                </button>

                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tambah Pengguna
                </button>

                <button wire:loading class="btn btn-info">
                    Loading..
                </button>

            </div>
        </div>



        {{-- =======================
             MENU LIHAT
        ======================== --}}
        @if ($pilihanMenu == 'lihat')

            <div class="row">
                <div class="col-12">
                    <div class="card border-primary shadow-sm">

                        <div class="card-header fw-bold">
                            Semua Pengguna
                        </div>

                        <div class="card-body">

                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-primary">
                                    <tr class="text-center">
                                        <th width="5%">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($semuaPengguna as $pengguna)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $pengguna->name }}</td>
                                            <td>{{ $pengguna->email }}</td>
                                            <td class="text-capitalize">{{ $pengguna->peran }}</td>

                                            <td class="text-center">
                                                <button wire:click="pilihEdit({{ $pengguna->id }})"
                                                    class="btn btn-sm btn-outline-primary">
                                                    Edit
                                                </button>

                                                <button wire:click="pilihHapus({{ $pengguna->id }})"
                                                    class="btn btn-sm btn-outline-danger">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>



        {{-- =======================
             MENU TAMBAH
        ======================== --}}
        @elseif ($pilihanMenu == 'tambah')

            <div class="row">
                <div class="col-12">
                    <div class="card border-primary shadow-sm">

                        <div class="card-header fw-bold">
                            Tambah Pengguna Baru
                        </div>

                        <div class="card-body">

                            <form wire:submit='simpan'>

                                <div class="mb-3">
                                    <label class="fw-semibold">Nama</label>
                                    <input type="text" class="form-control" wire:model='nama'>
                                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="fw-semibold">Email</label>
                                    <input type="email" class="form-control" wire:model='email'>
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="fw-semibold">Password</label>
                                    <input type="password" class="form-control" wire:model='password'>
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="fw-semibold">Peran</label>
                                    <select class="form-control" wire:model='peran'>
                                        <option value="">-- Pilih Peran --</option>
                                        <option value="kasir">Kasir</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @error('peran') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>



        {{-- =======================
             MENU EDIT
        ======================== --}}
        @elseif ($pilihanMenu == 'edit')

            <div class="row">
                <div class="col-12">
                    <div class="card border-primary shadow-sm">

                        <div class="card-header fw-bold">
                            Edit Pengguna
                        </div>

                        <div class="card-body">
                            <form wire:submit='simpanEdit'>

                                <div class="mb-3">
                                    <label class="fw-semibold">Nama</label>
                                    <input type="text" class="form-control" wire:model='nama'>
                                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="fw-semibold">Email</label>
                                    <input type="email" class="form-control" wire:model='email'>
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="fw-semibold">Password (opsional)</label>
                                    <input type="password" class="form-control" wire:model='password'>
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="fw-semibold">Peran</label>
                                    <select class="form-control" wire:model='peran'>
                                        <option value="">-- Pilih Peran --</option>
                                        <option value="kasir">Kasir</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @error('peran') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" wire:click='batal'>Batal</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>



        {{-- =======================
             MENU HAPUS
        ======================== --}}
        @elseif ($pilihanMenu == 'hapus')

            <div class="row">
                <div class="col-12">
                    <div class="card border-danger shadow-sm">
                        <div class="card-header fw-bold bg-danger text-white">
                            Hapus Pengguna
                        </div>

                        <div class="card-body">
                            <p>Yakin ingin menghapus pengguna ini?</p>

                            <p>
                                <strong>Nama:</strong> {{ $penggunaTerpilih->name }} <br>
                                <strong>Email:</strong> {{ $penggunaTerpilih->email }}
                            </p>

                            <div class="d-flex gap-2">
                                <button class="btn btn-danger" wire:click='hapus'>
                                    Hapus
                                </button>

                                <button class="btn btn-secondary" wire:click='batal'>
                                    Batal
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        @endif

    </div>
</div>
