<div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Hero Section --}}
    {{-- <div class="row mt-5 mb-5 row-sm-12">
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
    </div> --}}

    <!-- Hero -->
    <div class="text-center bg-image"
        style="
    background-image: url('https://statik.unesa.ac.id/profileunesa_konten_statik/uploads/pusdippket/thumbnail/a6bf8cce-e619-46de-9715-d3b2b90e6512.jpg');height: 400px;
">
        <div class="mask h-100" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <div class="h4">ᮝᮤᮜᮥᮏᮩᮀ ᮞᮥᮙ᮪ᮕᮤᮀ ᮓᮤ ᮞᮤᮁᮔᮌᮜᮤᮂ</div>
                    <div class="mb-3 fw-bold h1">Wilujeung Sumping di Sirnagalih</div>
                    <div class="fst-italic mb-4 h5">"Dituntun ku santun, dipiara ku rasa, dilatih peurih, diasuh lungguh, diasah ku kanyaah, disipuh ku karipuh."</div>
                    <a data-mdb-ripple-init class="btn btn-outline-light mt-3" href="#!"
                        role="button">Selengkapnya&nbsp;<i class="fas fa-paper-plane"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero -->


    {{-- Layanan --}}
    <div class="container-fluid">
        <div class="container p-5">
            <div class="text-center mb-5">
                <h1 class="fw-bold">Layanan Administrasi</h1>
                <hr class="w-50 mx-auto text-primary">
                <p>Yuk, manfaatkan layanan administrasi kependudukan desa kita yang super praktis dan mudah! Sekarang, untuk urusan pembuatan akta kelahiran, akta kematian, kartu keluarga, dan dokumen lainnya, kamu bisa langsung mengajukan permohonan melalui website ini.</p>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-5">
                @forelse ($surats as $surat)
                    <div class="col">
                        <a href="{{ route('createSurat', ['id' => $surat->id]) }}" class="link-decoration">
                            <div class="card card-grow bg-transparent">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="border border-3 border-primary rounded-4 mx-auto mb-3 d-flex align-items-center p-3"
                                            style="width: 200px;">
                                            <h1 class="mx-auto fw-bold">SKCK</h1>
                                        </div>
                                        {{-- <img src="{{ asset('assets/img/skck.png') }}" alt="" style="width: 200px" class="mb-3"> --}}
                                        <h4 class="fw-bold">{{ $surat->nama_surat }}</h4>
                                        <small class="card-text">{!! Str::limit($surat->desc, 100) !!}</small>
                                    </div>
                                </div>
                            </div>
                        </a>



                        {{-- <div class="card-group d-flex flex-column card-grow h-100">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $surat->nama_surat }}</h5>
                                    <small class="card-text">{!! Str::limit($surat->desc, 100) !!}</small>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="{{ route('createSurat', ['id' => $surat->id]) }}"
                                        class="btn btn-warning fw-bold w-100">Ajukan Permohonan Surat</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                @empty
                @endforelse
            </div>

            <div class="mt-5 text-center">
                <a href="{{ route('layanan') }}" class="fw-bold fs-5">Lihat semua layanan&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    {{-- Bank Sampah --}}
    <div class="container-fluid" style="background-color: rgb(255, 248, 248, 0.6)">
        <div class="container p-5">
            <div class="text-center mb-3">
                <h1 class="fw-bold">Bank Sampah</h1>
                <hr class="w-50 mx-auto text-primary">
                <p>Bank Sampah merupakan konsep pengumpulan sampah kering dan dipilah serta memiliki manajemen layaknya perbankan tapi yang ditabung bukan uang melainkan sampah. </p>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="fw-bold">Kamu bisa dapat Uang dengan mengikuti program Bank Sampah</h4>
                    <p class="my-3">Hey, kabar baik! dengan mengikuti program Bank Sampah, kamu bisa dapat uang lho. Ayo ikuti sekarang!</p>
                    <a href="{{ route('bankSampah') }}" class="btn btn-success fw-bold mt-3">Ikuti Sekarang &nbsp;<i class="fas fa-paper-plane"></i></a>
                </div>
                <div class="col">
                    <img src="{{ asset('assets/img/banksampah.png') }}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </div>

    {{-- Berita & Galeri --}}
    <div class="container-fluid">
        <div class="container p-5">
            <div class="row gap-3 justify-content-between">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold">Kabar Desa Terbaru</h2>
                    <a href="{{ route('berita') }}" class="fw-bold">Lihat semua &nbsp; <i
                            class="fas fa-arrow-right"></i></a>
                </div>
                <div class="col-4">
                        <img src="https://pict.sindonews.net/dyn/850/pena/news/2021/09/25/40/550692/desadesa-di-china-ini-bayar-pasangan-untuk-punya-banyak-anak-dbu.jpg"
                            class="rounded w-100" alt="...">
                            <div class="mt-3">
                                <h4 class="fw-bold">Mahasiswa IWU membuat Website untuk Desa nya</h5>
                                <p class="card-text"> <small class="text-secondary"><i class="fas fa-calendar-alt"></i> &nbsp;
                                        19/05/2024</small>
                                </p>
                                <p class="card-text">Gupron Nurjalil, Mahasiswa Informatika International Women University melalui Tugas Akhinya atau bisa disebut Skripsi,.....</p>
                                <a href="">Baca selengkapnya</a>
                            </div>
                </div>
                <div class="col">
                    <div class="row row-cols-1 row-cols-md-2 g-5">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="col">
                                <a href="" class="link-decoration">
                                    <div class="ratio ratio-16x9 mb-2">
                                        <img src="https://pict.sindonews.net/dyn/850/pena/news/2021/09/25/40/550692/desadesa-di-china-ini-bayar-pasangan-untuk-punya-banyak-anak-dbu.jpg"
                                            alt="" class="rounded object-fit-cover">
                                    </div>
                                    <p><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. </b><br>
                                        <span>
                                            <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam sit ex
                                                id. Magni
                                                voluptatibus eveniet, ipsam quibusdam</small>
                                        </span>
                                    </p>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Penduduk --}}
    <div class="container-fluid" style="background-color: rgb(255, 248, 248, 0.6)">
        <div class="container p-5">
            <h1 class="text-center fw-bold mb-5">Kependudukan Sirnagalih</h1>

            <div class="row row-cols-1 row-cols-md-4 g-5">
                <div class="col d-flex align-items-center justify-content-center card-grow">
                    <div class="text-center">
                        <div class="mb-3">
                            <img src="{{ asset('assets/img/undraw_people_re_8spw.svg') }}" alt="" class="w-50">
                        </div>
                        <h4 class="fw-bold">1.000.000 Jiwa</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, ratione?</p>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center card-grow">
                    <div class="text-center d-flex flex-column">
                        <div class="mb-3">
                            <img src="{{ asset('assets/img/undraw_small_town_re_7mcn.svg') }}" alt="" class="w-75">
                        </div>
                        <div class="mt-auto">
                            <h4 class="fw-bold">20 Dusun</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, molestiae!</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center card-grow">
                    <div class="text-center d-flex flex-column">
                        <div class="mb-3">
                            <img src="{{ asset('assets/img/undraw_off_road_re_leme.svg') }}" alt="" class="w-50">
                        </div>
                        <div class="mt-auto">
                            <h4 class="fw-bold">16 Rukun Warga (RW)</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, hic.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center card-grow">
                    <div class="text-center d-flex flex-column">
                        <div class="mb-3">
                            <img src="{{ asset('assets/img/undraw_celebration_re_kc9k.svg') }}" alt="" class="w-50">
                        </div>
                        <div class="mt-auto">
                            <h4 class="fw-bold">31 Rukun Tangga (RT)</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto, animi.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <a href="" class="fw-bold fs-5">Lihat semua statistik&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    {{-- Kontak --}}
    <section class="container p-5">
        <h2 class="text-center fw-bold mb-5">Kritik dan Saran Masyarakat</h2>
        <div class="row justify-content-around">
            <div class="col-4 text-center d-flex fw-bold align-items-center justify-content-center">
                Beri kami kritik dan saran yang membangun untuk kemajuan Website juga Desa Sirnagalih.
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
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
