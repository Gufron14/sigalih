@extends('admin.layout.master')

@section('subtitle', 'Data Warga Sirnagalih')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-body">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">TTL</th>
                    <th scope="col">JK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Perkawinan</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="colspan-2">Kewarganegaraan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wargas as $warga)
                    <tr>
                        <td>{{ $warga->id }}</td>
                        <td>{{ $warga->nik }}</td>
                        <td>{{ $warga->nama }}</td>
                        <td>{{ $warga->ttl }}</td>
                        <td>{{ $warga->jk }}</td>
                        <td>{{ $warga->alamat }}</td>
                        <td>{{ $warga->agama }}</td>
                        <td>{{ $warga->stts_perkawinan }}</td>
                        <td>{{ $warga->pekerjaan }}</td>
                        <td>{{ $warga->kewarganegaraan }}</td>
                        <td><a href={{ url('warga/show/' . $warga->id) }}><i class="fas fa-external-link-alt"></i>&nbsp;Lihat</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection