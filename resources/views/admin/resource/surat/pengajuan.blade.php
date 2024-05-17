@extends('admin.layout.master')

@section('title', 'Pengajuan Surat')
@section('subtitle', 'Pengajuan Surat')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="card-title">
            <h6 class="fw-bold">Daftar Pengguna yang Mengajukan Surat</h6>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-hover table-bordered">
            <thead>
                <tr>
                    <th>Tanggal & Waktu</th>
                    <th>Nama Pengguna</th>
                    <th class="text-center">Surat</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuans as $pengajuan)
                    <tr>
                        <td>{{ $pengajuan->created_at->format('d/m/y-H:i:s') }} - {{ $timeFormat }}</td>
                        <td>{{ $pengajuan->warga->nama }}</td>
                        <td>{{ $pengajuan->surat->nama_surat }}</td>
                        <td class="text-center">
                            @if ($pengajuan->status === 'tunggu')
                                <div class="badge badge-secondary">
                                    Menunggu
                                </div>
                            @elseif ($pengajuan->status === 'proses')
                                <div class="badge badge-primary">
                                    Diproses
                                </div>
                            @elseif ($pengajuan->status === 'selesai')
                                <div class="badge badge-success">
                                    Diproses
                                </div>
                            @elseif ($pengajuan->status === 'tolak')
                                <div class="badge badge-danger">
                                    Diproses
                                </div>
                            @endif
                        </td>
    
                        <td class="text-center">
                            <a href="{{ route('view-pengajuan', $pengajuan->id) }}">Proses</a>
                        </td>
                    </tr>
                @empty
                <td colspan="5">
                    <i class="far fa-times-circle text-danger" style="font-size: 58px"></i>
                    Belum ada yang mengajukan Surat Permohonan
                </td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
