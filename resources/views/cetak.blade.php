<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Invoice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        @media print {
            a {
                display: none;
            }

            .card {
                border: none !important;
            }
        }

        h4 {
            font-weight: 600;
        }

        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body onload="print()">

    <div class="container mt-4">

        <div class="text-center mb-4">
            <h3 class="fw-bold">Laporan Transaksi</h3>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th width="5%">No</th>
                    <th width="25%">Tanggal</th>
                    <th width="20%">No Inv</th>
                    <th width="20%">Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($semuaTransaksi as $transaksi)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->created_at }}</td>
                        <td class="text-center">{{ $transaksi->kode }}</td>
                        <td class="text-end">Rp {{ number_format($transaksi->total, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</body>
</html>
