<div class="container">
    <div class="row mt-4">
        <div class="col-12">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold mb-0">📄 Laporan Transaksi</h4>

                        <a href="{{ url('/cetak') }}" target="_blank" class="btn btn-primary btn-sm px-4">
                            CETAK
                        </a>
                    </div>

                    <hr class="mt-0 mb-4">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center" width="60">No</th>
                                    <th>Tanggal</th>
                                    <th>No Invoice</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaTransaksi as $transaksi)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($transaksi->created_at)->format('Y-m-d H:i') }}</td>
                                        <td class="fw-semibold">{{ $transaksi->kode }}</td>
                                        <td class="fw-bold text-success">
                                            Rp {{ number_format($transaksi->total, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
