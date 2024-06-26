<div>

    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Manajemen Berita</li>
    @endsection

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">
                Berita
            </h5>
            <a href="{{ route('createBerita') }}" class="btn btn-primary btn-sm fw-bold">
                <i class="fas fa-plus-circle me-2"></i>Tambah Berita
            </a>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <th>Gambar</th>
                    <th>Judul Berita</th>
                    <th>Konten</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td wire:key='{{ $post->image }}'>
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" style="width: 100px">
                            </td>
                            <td wire:key='{{ $post->title }}'>{{ $post->title }}</td>
                            <td>{!! Str::limit($post->content, 100) !!}</td>
                            <td class="text-center">
                                <a href="{{ route('updateBerita', $post->id) }}" class="btn btn-sm btn-secondary-faded">
                                    <i class="fas fa-edit text-primary"></i>
                                </a>
                                <button class="btn btn-sm btn-secondary-faded" wire:click="destroy({{ $post->id }})"
                                    wire:confirm="Apa kamu yakin ingin Hapus ini?">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5" class="text-danger text-center p-5">Nothing.</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
