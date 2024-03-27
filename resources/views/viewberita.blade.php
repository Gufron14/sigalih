@extends('components.app-layout')
@section('title', 'Kabar Sirnagalih')

@section('content')
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/berita">Kabar Sirnagalih</a></li>
                <li class="breadcrumb-item active" aria-current="page">Soal Gaji Kades dan Perangkat di Purworejo yang
                    Terlambat, Ini
                    Penjelasan OPD Terkait</li>
            </ol>
        </nav>

        {{-- Body --}}
        <div class="row">
            <div class="col-8">
                <h2 class="fw-bold mt-5">Soal Gaji Kades dan Perangkat di Purworejo yang Terlambat, Ini
                    Penjelasan OPD Terkait</h2>
                <p>Kamis, 28 Maret 2023 | Oleh: Admin</p>
                <img src="https://asset.kompas.com/crops/Arm2w34qO5GA02YF_1QMrQNPing=/0x0:0x0/750x500/data/photo/2024/03/25/6601690d2ffa8.jpg"
                    alt="">
                <div class="col-10 mt-5 gap-3">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, id. Laudantium et perspiciatis
                        dolorum fugit. Adipisci minima excepturi sed consequuntur expedita quaerat totam. Sapiente, dolores.
                        Odit facere aspernatur a voluptates dicta voluptas! Doloremque quis unde pariatur qui illo
                        architecto rerum nulla libero corporis? Iusto accusamus nam libero provident, itaque laboriosam.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, id. Laudantium et perspiciatis
                        dolorum fugit. Adipisci minima excepturi sed consequuntur expedita quaerat totam. Sapiente, dolores.
                        Odit facere aspernatur a voluptates dicta voluptas! Doloremque quis unde pariatur qui illo
                        architecto rerum nulla libero corporis? Iusto accusamus nam libero provident, itaque laboriosam.</p>
                </div>
                <hr class="mt-5 mb-3">
                <a href="">
                    <div class="d-inline-flex align-items-center gap-3">
                        <i class="far fa-thumbs-up fs-3"></i>
                        <h6 class="fw-bold">12 Like</h6>
                    </div>
                </a>
                <hr class="mt-3 mb-3">
                <h5 class="fw-bold">Komentar</h5>
            </div>
        </div>

        {{-- Like Komen --}}



    </div>
@endsection
