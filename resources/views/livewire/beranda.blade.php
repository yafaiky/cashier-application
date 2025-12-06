<div class="container py-4">

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="fw-bold mb-1">Halo, Masseh </h3>
                    <p class="text-muted mb-0">Selamat datang kembali di sistem kasir Hoyo. 😎</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="fw-semibold">Total Produk</h5>
                    <div class="fs-2 fw-bold text-primary">
                        {{ $totalProduk ?? 0 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="fw-semibold">Transaksi Hari Ini</h5>
                    <div class="fs-2 fw-bold text-success">
                        {{ $transaksiHariIni ?? 0 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="fw-semibold">Pendapatan Hari Ini</h5>
                    <div class="fs-3 fw-bold text-warning">
                        Rp {{ number_format($pendapatanHariIni ?? 0, 0, ',', '.') }}
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
