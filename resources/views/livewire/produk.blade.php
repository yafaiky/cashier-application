<div class="container mt-4">

    {{-- MENU --}}
    <div class="row mb-3">
        <div class="col-12">

            <div class="d-flex gap-2 flex-wrap">

                <button wire:click="pilihMenu('lihat')"
                    class="btn px-4 py-2 fw-semibold {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua Produk
                </button>

                <button wire:click="pilihMenu('tambah')"
                    class="btn px-4 py-2 fw-semibold {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tambah Produk
                </button>

                <div wire:loading class="badge bg-info text-dark px-3 py-2">
                    Loading...
                </div>

            </div>

        </div>
    </div>

    {{-- KONTEN --}}
    <div class="row">
        <div class="col-12">

            {{-- LIHAT PRODUK --}}
            @if ($pilihanMenu == 'lihat')
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <h4 class="fw-bold mb-3">📦 Semua Produk</h4>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center" width="60">No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th width="160">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($semuaProduk as $produk)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="fw-semibold">{{ $produk->kode }}</td>
                                            <td>{{ $produk->nama }}</td>
                                            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                            <td>{{ $produk->stok }}</td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button wire:click="pilihEdit({{ $produk->id }})"
                                                        class="btn btn-sm btn-outline-primary">
                                                        Edit
                                                    </button>

                                                    <button wire:click="pilihHapus({{ $produk->id }})"
                                                        class="btn btn-sm btn-outline-danger">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>

            {{-- TAMBAH PRODUK --}}
            @elseif ($pilihanMenu == 'tambah')
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <h4 class="fw-bold mb-3">➕ Tambah Produk</h4>
                        <hr>

                        <form wire:submit.prevent='simpan' class="row g-3">

                            <div class="col-md-6">
                                <label class="fw-semibold">Nama</label>
                                <input type="text" class="form-control" wire:model='nama'>
                                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="fw-semibold">Kode</label>
                                <input type="text" class="form-control" wire:model='kode'>
                                @error('kode') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="fw-semibold">Harga</label>
                                <input type="number" class="form-control" wire:model='harga'>
                                @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="fw-semibold">Stok</label>
                                <input type="number" class="form-control" wire:model='stok'>
                                @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary px-4">SIMPAN</button>
                            </div>

                        </form>

                    </div>
                </div>

            {{-- EDIT PRODUK --}}
            @elseif ($pilihanMenu == 'edit')
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <h4 class="fw-bold mb-3">✏️ Edit Produk</h4>
                        <hr>

                        <form wire:submit.prevent='simpanEdit' class="row g-3">

                            <div class="col-md-6">
                                <label class="fw-semibold">Nama</label>
                                <input type="text" class="form-control" wire:model='nama'>
                                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="fw-semibold">Kode</label>
                                <input type="text" class="form-control" wire:model='kode'>
                                @error('kode') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="fw-semibold">Harga</label>
                                <input type="number" class="form-control" wire:model='harga'>
                                @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="fw-semibold">Stok</label>
                                <input type="number" class="form-control" wire:model='stok'>
                                @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary px-4">SIMPAN</button>
                            </div>

                        </form>

                    </div>
                </div>

            {{-- HAPUS PRODUK --}}
            @elseif ($pilihanMenu == 'hapus')
                <div class="card shadow-sm border-0 border-danger">
                    <div class="card-header bg-danger text-white fw-bold">
                        Hapus Produk
                    </div>

                    <div class="card-body">

                        <h5 class="fw-semibold">Apakah Anda yakin ingin menghapus produk ini?</h5>

                        <div class="mt-3 mb-4 p-3 bg-light rounded">
                            <p class="mb-1"><strong>Kode:</strong> {{ $produkTerpilih->kode }}</p>
                            <p class="mb-0"><strong>Nama:</strong> {{ $produkTerpilih->nama }}</p>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-danger px-4" wire:click='hapus'>HAPUS</button>
                            <button class="btn btn-secondary px-4" wire:click='batal'>BATAL</button>
                        </div>

                    </div>
                </div>
            @endif

        </div>
    </div>

</div>
