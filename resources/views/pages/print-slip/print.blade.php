<!DOCTYPE html>
<html lang="en">

<head>
    <title>Slip Gaji</title>
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
    <h5 align="center">Kawasan Industri Bajamas, Jl. Raya Serang No.km 22, Pasir Bolang, Balaraja, Tangerang Regency,
        Banten 15720</h5>
    <hr />
    <h2 align="center"><u>Slip Gaji</u></h2>
    <div style="display: flex; margin-bottom: 30px;">
        <table width="50%">
            <tbody>
                <tr>
                    <td><b>Nama Karyawan</b></td>
                    <td>:</td>
                    <td>{{ $payroll[0]->karyawan->name }}</td>
                </tr>
                <tr>
                    <td><b>NIK</b></td>
                    <td>:</td>
                    <td>{{ $payroll[0]->karyawan->nik }}</td>
                </tr>
                <tr>
                    <td><b>Jenis Kelamin</b></td>
                    <td>:</td>
                    <td>{{ $payroll[0]->karyawan->jenis_kelamin }}</td>
                </tr>
            </tbody>
        </table>
        <table width="50%" style="float: right;">
            <tbody>
                <tr>
                    <td><b>No Hp</b></td>
                    <td>:</td>
                    <td>{{ $payroll[0]->karyawan->no_hp }}</td>
                </tr>
                <tr>
                    <td><b>Alamat</b></td>
                    <td>:</td>
                    <td>{{ $payroll[0]->karyawan->alamat }}</td>
                </tr>
                <tr>
                    <td><b>Tanggal Masuk Kerja</b></td>
                    <td>:</td>
                    <td>{{ $payroll[0]->karyawan->tgl_masuk_kerja }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <table border="2" width="100%" style="margin-top: 10px; margin: auto; text-align: center;">
        <thead>
            <tr>
                <th>No</th>
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
                        <td>{{ $item->tanggal_produksi }}</td>
                        <td>Rp.{{ number_format($item->total) }}</td>
                    </tr>
                    @php
                        $grandtotal += $item->total;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="2" style="text-align: right;"><b>Total</b></td>
                    <td><b>Rp. {{ number_format($grandtotal) }}</b></td>
                </tr>
            @else
                <tr>
                    <td colspan="8" style="text-align: center">Ooppps data dengan tanggal ini kosong!</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="tanda-tangan">
        <h3>Tangerang, <?= date('d-m-Y') ?>
        </h3>
        <p class="nm"><strong>Payroll</strong></p>
        <br>
        <br>
        <br>
        <br>
        <p class="nm"><strong>{{ Str::ucfirst($admin_payroll->name) }}</strong></p>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
