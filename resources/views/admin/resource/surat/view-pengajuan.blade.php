@extends('admin.layout.master')
@section('title', 'Pengajuan Surat')
@section('subtitle', 'Pengajuan Surat')
@section('content')
    <div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card-title">
                    <div class="justify-content-between">
                        <h6 class="fw-bold">Pengajuan {{ $pengajuans->surat->nama_surat }} </h6>
                        <small d-flex justify-content-end>{{ $pengajuans->created_at->translatedFormat('l, d F Y') }} - {{ $pengajuans->created_at->format('H:i:s') }} WIB</small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <div for="" class="form-label">Nomor Surat</div>
                        <input type="text" name="" id="" class="form-control"
                            placeholder="Masukan Nomor Surat">
                    </div>
                    <div class="col">
                        <div for="" class="form-label">Tanggal Surat</div>
                        <input type="text" name="" id="" class="form-control"
                            placeholder="Masukan Tanggal Surat">
                    </div>
                </div>
                <table class="table table-sm mb-5">
                    <thead class="table-secondary">
                        <tr>
                            <th colspan="3" class="h6 text-center fw-bold">Identitas Pengaju</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $pengajuans->warga->nama }}</td>
                            <td rowspan="7">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="https://air.eng.ui.ac.id/images/4/43/4x6_Pas_Photo_Darell_Jeremia_Sitompul.jpg"
                                        alt="" style="width: 4cm; height:6cm" class="border border-danger">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat, tanggal lahir</td>
                            <td>: {{ $pengajuans->warga->ttl }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{ $pengajuans->warga->status }}</td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: {{ $pengajuans->warga->jk }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>: {{ $pengajuans->warga->agama }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>: {{ $pengajuans->warga->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $pengajuans->warga->alamat }}, RT. {{ $pengajuans->warga->rt }} , RW.
                                {{ $pengajuans->warga->rw }}, Ds. {{ $pengajuans->warga->desa }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('wordExport', $pengajuans->warga->id) }}" class="btn btn-success fw-bold">Terima
                    Pengajuan</a>
                <a href="{{ url('surat/wordExport/' . $pengajuans->warga->id) }}" class="btn btn-danger fw-bold">Tolak
                    Pengajuan</a>
                <a href="{{ url('surat/wordExport/' . $pengajuans->warga->id) }}"
                    class="btn btn-secondary fw-bold">Kembali</a>
            </div>
        </div>
    </div>
@endsection
