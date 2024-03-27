@extends('components.app-layout')
@section('title', 'Kabar Sirnagalih')

@section('content')

    <div class="container mt-5">
        {{-- KABAR DESA --}}
        <div class="row justify-content-between mb-5">
            <div class="col">
                <h1 class="fw-bold">Kabar Desa</h1>
            </div>
            <div class="col d-flex align-items-center justify-content-end">
                <form class="d-flex w-100" role="search">
                    <input class="form-control form-control-lg me-2" type="search" placeholder="Cari berita"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
            </div>
        </div>

        {{-- BERITA --}}
        <div class="row justify-content-between">
            {{-- Berita Terbaru --}}
            <div class="col-5">
                <h4 class="fw-bold mb-3">Berita Terbaru</h4>
                <a href="/viewberita">
                    <div class="card">
                        <img src="https://asset.kompas.com/crops/Arm2w34qO5GA02YF_1QMrQNPing=/0x0:0x0/750x500/data/photo/2024/03/25/6601690d2ffa8.jpg"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Soal Gaji Kades dan Perangkat di Purworejo yang Terlambat, Ini
                                Penjelasan OPD Terkait</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos
                                laudantium reiciendis aperiam nemo officia, distinctio commodi beatae ea natus repudiandae.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Berita Populer --}}
            <div class="col-6">
                <h5 class="mb-3">Berita Populer</h5>
                <div class="row gap-3">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="https://fisipol.uma.ac.id/wp-content/uploads/2022/01/pengertian-desa.jpg"
                                    class="rounded-2" alt="" style="width: 160px;">
                            </div>
                            <div class="col">
                                <h6 class="fw-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate,
                                    hic?</h6>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <hr class="mt-5 mb-5">

        {{-- VIDEO --}}
        <div class="row gap-5">
            <div class="col">
                <h4 class="fw-bold mb-3">Video</h4>
                <iframe class="w-100" src="https://www.youtube.com/watch?v=GEyUDgXmHHI" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
                <h5 class="fw-bold">Profil Desa Sirnagalih Kecamatan Cisurupan Kabupaten Garut, Jawa Barat</h5>

            </div>
            <div class="col-6">
                <h5 class="mb-3">Video Lainnya</h5>
                <div class="row gap-3">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="https://fisipol.uma.ac.id/wp-content/uploads/2022/01/pengertian-desa.jpg"
                                    class="rounded-2" alt="" style="width: 160px;">
                            </div>
                            <div class="col">
                                <h6 class="fw-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate,
                                    hic?</h6>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <hr class="mt-5 mb-5">

        {{-- BERITA LAINNYA --}}
        <div class="row gap-3">
            <h4 class="fw-bold">Berita Lainnya</h4>
            @for ($i = 0; $i < 5; $i++)
                <div class="col gap-3 align-items-center">
                    <img src="https://fisipol.uma.ac.id/wp-content/uploads/2022/01/pengertian-desa.jpg"
                        class="rounded-2 w-100" alt="">
                    <h6 class="mt-3 fw-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, architecto.
                    </h6>
                </div>
            @endfor
        </div>
    </div>

@endsection
