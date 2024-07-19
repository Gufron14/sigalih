<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bank Sampah</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Laporan Bank Sampah Desa Sirnagalih</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Dana Masuk</th>
                <th>Dana Keluar</th>
                <th>Sisa Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $transaction->ket }}</td>
                    <td>@if($transaction->dana_masuk > 0) @currency($transaction->dana_masuk) @endif</td>
                    <td>@if($transaction->dana_keluar > 0) @currency($transaction->dana_keluar) @endif</td>
                    <td>@currency($transaction->sisa_saldo)</td>
                </tr>
            @endforeach
            <tr style="font-weight: bold;">
                <td colspan="2">Total</td>
                <td>@currency($totalDanaMasuk)</td>
                <td>@currency($totalDanaKeluar)</td>
                <td>@currency($totalSaldo)</td>
            </tr>
        </tbody>
    </table>
    
    <br>
    <p>Penanggung Jawab</p>
    <br>
    <br>
    <p>Gupron Nurjalil</p>
</body>
</html>
