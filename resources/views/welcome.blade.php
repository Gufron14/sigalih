@extends('components.app-layout')

@section('content')
    <div class="container">

        {{-- Hero Section --}}
        <div class="row mt-5 row-sm-12">
            <div class="col">
                <h1 class="fw-bold">Selamat Datang <br> di Website Desa Sirnagalih <br> Cisurupan - Garut</h1>
                <div class="col-9 mt-3">
                    <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, ad. Rem fugiat ex
                        optio consequuntur. Necessitatibus nemo, doloribus voluptatum ullam assumenda, possimus odio aliquid
                        facilis, natus minus quos praesentium sapiente temporibus. Quos sapiente iusto et laboriosam, ad
                        voluptatem non quod aperiam voluptates explicabo eaque maxime exercitationem, quo voluptatum, saepe
                        incidunt?</p>
                </div>
                <button class="btn btn-primary fw-bold mt-3 fs-5">Selengkapnya</button>
            </div>
            <div class="col">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://asset.kompas.com/crops/QYPrekuxiyDvv1dqq2DyBjqqCLI=/0x0:1000x667/750x500/data/photo/2022/05/29/6293992a8d709.jpg"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.simpeldesa.com/blog/wp-content/uploads/2020/07/musyawarah-desa.jpg"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://mmc.tirto.id/image/otf/1024x535/2022/06/14/istock-1392069533_ratio-16x9.jpg"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <hr class="m-5">

        {{-- Layanan --}}
        <div class="container mb-5">
            <h3 class="text-center fw-bold mb-5">Layanan Administrasi</h3>
            <div class="d-flex justify-content-center align-items-center h-100 gap-5">
                <div class="card w-50">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex align-items-center justify-content-center">
                                <i class="fas fa-id-card text-success" style="font-size: 44pt"></i>
                            </div>
                            <div class="col-9">
                                <h5 class="card-title text-success fw-bold">Pengajuan KTP</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card w-50">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex align-items-center justify-content-center">
                                <i class="fas fa-id-card text-success" style="font-size: 44pt"></i>
                            </div>
                            <div class="col-9">
                                <h5 class="card-title text-success fw-bold">Keterangan Domisili</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card w-50">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex align-items-center justify-content-center">
                                <i class="fas fa-id-card text-success" style="font-size: 44pt"></i>
                            </div>
                            <div class="col-9">
                                <h5 class="card-title text-success fw-bold">Kartu Keluarga</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center">
                <a href="" class="btn btn-warning fw-bold">Lihat semua layanan&nbsp;<i
                        class="fas fa-paper-plane"></i></a>
            </div>
        </div>
        <hr class="m-5">

        {{-- Berita & Galeri --}}
        <div class="row">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold">Kabar Desa Terbaru</h3>
                <a href="">Lihat Semua</a>
            </div>
            <div class="col">
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
            </div>
            <div class="col">
                <div class="row justify-content-end">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://cdnwpedutorenews.gramedia.net/wp-content/uploads/2023/01/05171439/Pengertian-Desa.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                        to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://cdnwpedutorenews.gramedia.net/wp-content/uploads/2023/01/05171439/Pengertian-Desa.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                        to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://cdnwpedutorenews.gramedia.net/wp-content/uploads/2023/01/05171439/Pengertian-Desa.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                        to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Include other cards similarly -->
                </div>
            </div>
            
        </div>

        <hr class="m-5">

        {{-- Penduduk --}}
        <div class="container">
            <h3 class="text-center fw-bold mb-5">Statistik Penduduk Desa Sirnagalih</h3>
            <div class="d-flex d-flex justify-content-center align-items-center gap-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <i class="fas fa-users fs-1"></i>
                            <div>
                                <h4 class="fw-bold">1.234.456</h4>
                                <p>Jiwa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <i class="fas fa-users fs-1"></i>
                            <div>
                                <h4 class="fw-bold">12</h4>
                                <p>Dusun</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <i class="fas fa-users fs-1"></i>
                            <div>
                                <h4 class="fw-bold">12 RW</h4>
                                <p>Rukun Warga</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <i class="fas fa-users fs-1"></i>
                            <div>
                                <h4 class="fw-bold">12 RW</h4>
                                <p>Rukun Warga</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <i class="fas fa-users fs-1"></i>
                            <div>
                                <h4 class="fw-bold">12 RW</h4>
                                <p>Rukun Warga</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center">
                <a href="" class="btn btn-warning fw-bold">Lihat Semua Statistik&nbsp;<i
                        class="fas fa-paper-plane"></i></a>
            </div>
        </div>

        <hr class="m-5">

        {{-- Kontak --}}
        <section class="kontak">
            <h3 class="text-center fw-bold mb-5">Kritik dan Saran Masyarakat</h3>
            <div class="row justify-content-around">
                <div class="col-4 text-center d-flex fw-bold align-items-center justify-content-center">
                    Beri kami kritik dan saran yang membangun untuk kemajuan Website juga Desa Sirnagalih.
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kritik dan Saran</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary fw-bold mx-auto">Kirim&nbsp;<i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </section>
    </div>
@endsection
