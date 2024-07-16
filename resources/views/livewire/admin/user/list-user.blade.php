<div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nik }}</td>
                        <td>{{ $user->warga->nama }}</td>
                        <td>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $user->email }}" target="_blank" rel="noopener noreferrer">
                                {{ $user->email }}
                            </a>
                        </td>
                        <td>
                            <a href="https://wa.me/{{ $user->phone }}" target="_blank" rel="noopener noreferrer">{{ $user->phone }}
                            </a>
                        </td>
                        <td>
                            <a href="" class="btn btn-sm btn-warning">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted p-5">
                            Belum ada Data.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
