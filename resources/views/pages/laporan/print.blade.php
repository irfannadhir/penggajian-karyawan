<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Transaksi</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <style>
        .tanda-tangan {
            right: 80px;
            bottom: 50px;
            /* display: none; */
            z-index: 100;
            margin: 5px 0 10px 15px;
            padding: 15px;
            position: absolute;
        }

        .nm {
            margin-left: 80px;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <img src="{{ asset('Logo-Transparent-Clean-768x686.png') }}" alt="" style="display: flex; position: absolute;"
        width="5%;">
    <h1 align="center">PT. Batavia Cyclindo Industri</h1>
    <h5 align="center">Kawasan Industri Bajamas, Jl. Raya Serang No.km 22, Pasir Bolang,
        Balaraja, Tangerang Regency,
        Banten 15720</h5>
    <hr style="margin-bottom: 50px;" />
    <h2 align="center"><u>Laporan Transaksi</u></h2>
    <table border="2" width="100%" style="margin-top: 10px; margin: auto; text-align: center;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Produksi</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @if (count($payroll) > 0)
                @php
                    $grandtotal = 0;
                @endphp
                @foreach ($payroll as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->karyawan->name }}</td>
                        <td>{{ $item->tanggal_produksi }}</td>
                        <td>Rp.{{ number_format($item->total) }}</td>
                    </tr>
                    @php
                        $grandtotal += $item->total;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="3" style="text-align: right;"><b>Total</b></td>
                    <td><b>Rp. {{ number_format($grandtotal) }}</b></td>
                </tr>
            @else
                <tr>
                    <td colspan="8" style="text-align: center">Ooppps data dengan tanggal ini kosong!</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="">
        <p>Total pengeluaran gaji di tanggal: {{ date('d-m-Y', strtotime($tanggal_awal)) }} sampai dengan tanggal
            {{ date('d-m-Y', strtotime($tanggal_akhir)) }} adalah
            <b>Rp. {{ number_format($grandtotal) }}</b>
        </p>
    </div>

    <div class="tanda-tangan">
        <h3>Tangerang, <?= date('d-m-Y') ?>
        </h3>
        <p class="nm"><strong>Payroll</strong></p>
        <br>
        <br>
        <br>
        <br>
        <p class="nm"><strong>{{ Str::ucfirst($admin_payroll->name ?? '') }}</strong></p>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
