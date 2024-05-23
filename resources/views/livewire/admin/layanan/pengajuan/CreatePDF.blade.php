<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SKD-Gupron-Nurjali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @page {
            margin : 2.54cm;
        }
    </style>
  </head>
  <body>
    
    <div>
        {{-- KOP Surat --}}
        <div class="text-center">
            <h6>PEMERINTAHAN KABUPATEN GARUT <br> KECAMATAN CISURUPAN</h6>
            <h2>KANTOR DESA SIRNAGALIH</h2>
            <p>Jl. Desa Sirnagalih Kecamatan Cisurupan Kabupaten Garut 44163</p>
        </div>

        <hr>
    
        {{-- Nama Surat --}}
        <div class="text-center">
            <h4 class="text-decoration-underline">SURAT KETERANGAN DOMISILI</h4>
            <p>Nomor :</p>
        </div>
    
        {{-- Isi --}}
        <div>
            <p class=" lh-base">Yang bertandatangan dibawah ini Kepala Desa Sirnagalih Kecamatan Cisurupan Kabupaten Garut dengan ini menerangkan bahwa:</p>
            <div class="">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $pengajuan->warga->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tempat, tanggal lahir</td>
                            <td>: {{ $pengajuan->warga->ttl }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{ $pengajuan->warga->status }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: {{ $pengajuan->warga->jk }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>: {{ $pengajuan->warga->agama }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>: {{ $pengajuan->warga->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $pengajuan->warga->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class=" lh-base">Menurut sepengetahuan kami bahwa yang Namanya tersebut diatas memang benar warga berdomisili di ${alamat} ${desa} Kecamatan Cisurupan Kabupaten Garut.</p>
            <p class=" lh-base">Demikianlah surat keterngan domisili ini kami buat, untuk dapat dipergunakan sebagaimana perlunya.</p>
    
        </div>
    
        {{-- TTD --}}
        <div class="text-end me-3">
            <p>Sirnagalih, 20 Mei 2024</p>
            <p>Sekretaris Desa</p> <br><br><br>
            <p>Nama</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

