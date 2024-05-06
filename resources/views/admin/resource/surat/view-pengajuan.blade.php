@extends('admin.layout.master')

@section('subtitle', 'Pengajuan Surat')
@section('content')
<div>
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h3 class="mb-3">Pengajuan {{ $surats->jenisSurat->nama_surat }}</h3>
            <div class="row">
                <div class="col">
                    <table class="table-sm" >
                        <tr>
                            <td>Hari/tanggal</td>
                            <td>: {{ $surats->created_at->translatedFormat('l, d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>: {{ $surats->created_at->format('H:i:s')  }} WIB</td>
                        </tr>
                    </table>
                </div>
                <div class="col">
                    <table class="table-sm" >
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td>: <a href="">email@contoh.com</a> </td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td>: <a href="">087780752099</a> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col">
                    <div for="" class="form-label">Nomor Surat</div>
                    <input type="text" name="" id="" class="form-control" placeholder="Masukan Nomor Surat">
                </div>
                <div class="col">
                    <div for="" class="form-label">Tanggal Surat</div>
                    <input type="text" name="" id="" class="form-control" placeholder="Masukan Tanggal Surat">
                </div>
            </div>
            <table class="table table-sm mb-5">
                <thead class="table-secondary">
                    <tr>
                        <th colspan="3" class="h5 text-center fw-bold">Identitas Diri</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $surats->warga->nama }}</td>
                        <td rowspan="7">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="https://air.eng.ui.ac.id/images/4/43/4x6_Pas_Photo_Darell_Jeremia_Sitompul.jpg" alt="" style="width: 4cm; height:6cm" class="border border-danger">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat, tanggal lahir</td>
                        <td>: {{ $surats->warga->ttl }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{ $surats->warga->stts_perkawinan }}</td>
                    </tr>
                    
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{ $surats->warga->jk }}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>: {{ $surats->warga->agama }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>: {{ $surats->warga->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $surats->warga->alamat }}, RT. {{ $surats->warga->rt }} , RW. {{ $surats->warga->rw }}, Ds. {{ $surats->warga->desa }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ url('surat/wordExport/'. $surats->warga->id) }}" class="btn btn-success fw-bold">Terima Pengajuan</a>
            <a href="{{ url('surat/wordExport/'. $surats->warga->id) }}" class="btn btn-danger fw-bold">Tolak Pengajuan</a>
            <a href="{{ url('surat/wordExport/'. $surats->warga->id) }}" class="btn btn-secondary fw-bold">Kembali</a>
        </div>
    </div>
</div>
@endsection
