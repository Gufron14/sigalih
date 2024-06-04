<div>

    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Surat</li>
    @endsection
    @section('button')
        <a class="btn btn-sm btn-primary" href="{{ route('surat.create') }}">
            <i class="ri-add-circle-line align-bottom"></i>&nbsp;Surat Baru
        </a>
    @endsection

    <div class="row">
        <div class="col-12">
            {{-- Daftar Surat --}}
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Daftar Surat</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Surat</th>
                                    <th>Deskripsi</th>
                                    <th>Template</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($surats as $surat)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $surat->nama_surat }}</td>
                                        <td>{!! $surat->desc !!}</td>
                                        <td><a href=""><i class="fas fa-file-word"></i> &nbsp;
                                                {{ $surat->template }}</a></td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                {{-- <livewire:admin.layanan.surat.update/> --}}
                                                {{-- <form action="{{ route('surat.delete', $surat->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE') --}}
                                                <a href="" class="fas fa-edit text-primary"
                                                    wire:click="update({{ $surat->id }})"></a>
                                                <a href="" class="fas fa-trash text-danger"
                                                    wire:click="delete({{ $surat->id }})"></a>
                                                {{-- </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="4" class="text-center p-5">
                                        <i class="far fa-times-circle text-danger" style="font-size: 58px"></i>
                                        <div class="text-danger mt-3">
                                            Belum ada Surat.
                                        </div>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</div>
