<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container py-5">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">TTL</th>
                <th scope="col">JK</th>
                <th scope="col">Alamat</th>
                <th scope="col">Agama</th>
                <th scope="col">Perkawinan</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Kewarganegaraan</th>
                <th scope="col">Dibuat</th>
              </tr>
            </thead>
            <tbody> 
              
                <tr>
                    <td>{{ $warga->id }}</td>
                    <td>{{ $warga->nik }}</td>
                    <td>{{ $warga->nama }}</td>
                    <td>{{ $warga->ttl }}</td>
                    <td>{{ $warga->jk }}</td>
                    <td>{{ $warga->alamat}}</td>
                    <td>{{ $warga->agama }}</td>
                    <td>{{ $warga->stts_perkawinan }}</td>
                    <td>{{ $warga->pekerjaan }}</td>
                    <td>{{ $warga->kewarganegaraan }}</td>
                    <td>{{ $warga->created_at->format('d F Y') }}</td>
                </tr>
              </tbody>
            </table>
            <a href="{{ url('warga/wordExport/'. $warga->id) }}" class="btn btn-primary">Download</a>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>