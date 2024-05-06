@extends('admin.layout.master')

@section('title', 'Pengajuan Surat')

@section('content')
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search Mail">
                        <div class="input-group-append">
                            <div class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-reply"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <div class="float-right">
                        1-50/200
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        <!-- /.btn-group -->
                    </div>
                    <!-- /.float-right -->
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover">
                        <tbody>
                            @forelse ($pengajuans as $pengajuan)
                                <tr class="suratRow" data-url="{{ route('view-surat', ['id' => $pengajuan->id]) }}">
                                    <td>
                                        <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check1">
                                            <label for="check1"></label>
                                        </div>
                                    </td>
                                    <td class="mailbox-name">
                                        {{ $pengajuan->warga->nama }}
                                    </td>
                                    <td class="mailbox-subject">mengirim Permohonan {{ $pengajuan->surat->nama_surat }}
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">{{ $timeFormat }}</td>
                                    <td>
                                        @if ($surat->status == '0')
                                            <div class="badge badge-danger">Ditolak</div>
                                        @elseif($surat->status == '1')
                                            <div class="badge badge-secondary">Menunggu</div>
                                        @elseif($surat->status == '2')
                                            <div class="badge badge-warning">Diproses</div>
                                        @elseif($surat->status == '3')
                                            <div class="badge badge-success">Selesai</div>
                                        @endif
                                    </td>
                                @empty
                                    <td colspan="5">
                                        <div class="text-center text-danger">
                                            Belum ada Permintaan Surat
                                        </div>
                                    </td>
                            @endforelse
                            </tr>
                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    {{-- <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Pengajuan Surat Permohonan
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Pengaju</th>
                        <th>Nama Surat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuans as $surat)
                        <tr>
                            <td>{{ $surat->created_at->timezone('Asia/Jakarta')->format('d F Y - H:i:s') }} WIB</td>
                            <td>{{ $surat->warga->nama }}</td>
                            <td>{{ $surat->jenisSurat->nama_surat }}</td>
                            <td>
                                @if ($surat->status == '0')
                                    <div class="badge badge-secondary">Ditolak</div>
                                @elseif($surat->status == '1')
                                    <div class="badge badge-success">Menunggu</div>
                                @elseif($surat->status == '2')
                                    <div class="badge badge-warning">Diproses</div>
                                @elseif($surat->status == '3')
                                    <div class="badge badge-success">Selesai</div>
                                @endif
                            </td>
                            <td>
                                <a href="">Proses &nbsp; <i class="fas fa-external-link-alt"></i></a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5">
                            <div class="text-center text-danger">
                                Belum ada Permintaan Surat
                            </div>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        var rows = document.querySelectorAll(".suratRow");

        rows.forEach(function(row) {
            row.addEventListener("click", function() {
                var url = this.dataset.url;
                window.location.href = url;
            });
            row.style.cursor = "pointer";
        });
    });
    </script>
    
@endsection
