<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- Tambah Surat --}}
                <livewire:admin.layanan.surat.update :id="$surats->first()->id" />
                {{-- Daftar Surat --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title fw-bold">Daftar Surat</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Surat</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Template</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($surats as $surat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $surat->nama_surat }}</td>
                                        <td>{{ $surat->desc }}</td>
                                        <td><a href=""><i class="fas fa-file-word"></i> &nbsp;
                                                {{ $surat->template }}</a></td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <livewire:admin.layanan.surat.update/>
                                                {{-- <form action="{{ route('surat.delete', $surat->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE') --}}
                                                    <button wire:click="delete({{ $surat->id }})" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
