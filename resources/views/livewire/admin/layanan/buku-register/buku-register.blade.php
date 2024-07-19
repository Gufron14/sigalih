<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Register</title>
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

        h2{
            text-align: center;
        }

        div {
            text-align: center;
            display: flex;
        }
    </style>
</head>

<body>
    <h2>Buku Register Desa Sirnagalih</h2>
    <table>
        <thead>
            <th>NO</th>
            <th>Tanggal Surat</th>
            <th>Jenis Surat</th>
            <th>Nomor Register</th>
            <th>Nama Pemohon</th>
            <th>Tempat, tanggal lahir</th>
            <th>Alamat</th>
            {{-- <th>Tujuan Surat</th> --}}
        </thead>
        <tbody>
            @forelse ($registers as $register)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($register->tanggal_surat)->format('d/m/Y') }}</td>
                    <td>{{ $register->jenisSurat->nama_surat }}</td>
                    <td>{{ $register->nomor_surat }}</td>
                    <td>{{ $register->user->warga->nama }}</td>
                    <td>{{ $register->user->warga->ttl }}</td>
                    <td>Kp. {{ $register->user->warga->alamat }},
                        RT. {{ $register->user->warga->rt }},
                        RW. {{ $register->user->warga->rw }}
                    </td>
                    {{-- <td></td> --}}
                </tr>
            @empty
                <td colspan="7" class="p-3">Belum ada Data</td>
            @endforelse
        </tbody>
    </table>
    <br>
    <p>Mengetahui, <br> Kepala Desa Sirnagalih</p>
    <br>
    <br>
    <p>Asep Taufik Hidayat, S.Pd.I</p>

</body>

</html>
