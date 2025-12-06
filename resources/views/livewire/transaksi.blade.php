<div class="container mt-3">

    {{-- TOMBOL UTAMA --}}
    <div class="row">
        <div class="col-12 d-flex gap-2">

            @if (!$transaksiAktif)
                <button class="btn btn-primary px-4 fw-semibold" wire:click="transaksiBaru">
                    + Transaksi Baru
                </button>
            @else
                <button class="btn btn-danger px-4 fw-semibold" wire:click="batalTransaksi">
                    Batalkan Transaksi
                </button>
            @endif

            <div wire:loading class="badge bg-info text-dark px-3 py-2 rounded">
                Loading...
            </div>

        </div>
    </div>

    @if ($transaksiAktif)
        <div class="row mt-3">

            {{-- KOLOM KIRI --}}
            <div class="col-md-8">

                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <h4 class="fw-bold mb-3 text-primary">
                            Invoice : {{ $transaksiAktif->kode }}
                        </h4>

                        <input 
                            type="text"
                            class="form-control form-control-lg mb-3"
                            placeholder="Scan / Input Kode Barang"
                            wire:model.live="kode"
                        />

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th width="80">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($semuaProduk as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="fw-semibold">{{ $produk->produk->kode }}</td>
                                            <td>{{ $produk->produk->nama }}</td>
                                            <td>Rp {{ number_format($produk->produk->harga, 0, ',', '.') }}</td>
                                            <td>{{ $produk->jumlah }}</td>
                                            <td>
                                                Rp {{ number_format($produk->produk->harga * $produk->jumlah, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger">
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

            {{-- KOLOM KANAN --}}
            <div class="col-md-4">

                {{-- TOTAL --}}
                <div class="card shadow-sm border-0 mb-2">
                    <div class="card-body">

                        <h5 class="fw-bold text-primary">Total Belanja</h5>
                        <div class="d-flex justify-content-between fs-4 fw-bold mt-2">
                            <span>Rp</span>
                            <span>{{ number_format($totalSemuaBelanja, 0, ',', '.') }}</span>
                        </div>

                    </div>
                </div>

                {{-- BAYAR --}}
                <div class="card shadow-sm border-0 mb-2">
                    <div class="card-body">

                        <h5 class="fw-bold text-primary">Bayar</h5>

                        <input
                            type="number"
                            class="form-control form-control-lg mt-2"
                            placeholder="Masukkan jumlah pembayaran"
                            wire:model.live="bayar"
                        />

                    </div>
                </div>

                {{-- KEMBALIAN --}}
                <div class="card shadow-sm border-0 mb-2">
                    <div class="card-body">

                        <h5 class="fw-bold text-primary">Kembalian</h5>

                        <div class="d-flex justify-content-between fs-4 fw-bold mt-2">
                            <span>Rp</span>
                            <span>{{ number_format($kembalian, 0, ',', '.') }}</span>
                        </div>

                    </div>
                </div>

                {{-- VALIDASI BAYAR --}}
                @if ($bayar)
                    @if ($kembalian < 0)
                        <div class="alert alert-danger">
                            Uang tidak cukup.
                        </div>
                    @else
                        <button 
                            class="btn btn-success w-100 py-2 fw-bold fs-5 shadow-sm"
                            wire:click="transaksiSelesai"
                        >
                            ✔ Bayar & Selesai
                        </button>
                    @endif
                @endif

            </div>

        </div>
    @endif

</div>
