<div>

    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Manajemen Berita</li>
    @endsection

    @section('button')
        <a href="{{ route('createBerita') }}" class="btn btn-primary">
            Tambah Berita
        </a>
    @endsection

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Berita
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>Gambar</th>
                    <th>Judul Berita</th>
                    <th>Konten</th>
                    <th>Slug</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td wire:key='{{ $post->image }}'>
                                <img src="{{ Storage::url($post->image) }}" alt="image" style="width: 100px">
                            </td>
                            <td wire:key='{{ $post->title }}'>{{ $post->title }}</td>
                            <td>{!! Str::limit($post->content, 100) !!}</td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                <div class="mb-1">
                                    <a href="{{ route('updateBerita', $post->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <div>
                                    <button class="btn btn-danger"
                                        wire:click="destroy({{ $post->id }})"
                                        wire:confirm="Apa kamu yakin ingin Hapus ini?">
                                        <i class="fas fa-trash text-light"></i>
                                    </button>
                                </div>
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
