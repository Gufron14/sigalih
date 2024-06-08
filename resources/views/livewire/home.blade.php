<div>
    @if (session()->has('success'))
        <div class="alert alert-success w-50 mx-auto my-3">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger w-50 mx-auto my-3">
            {{ session('error') }}
        </div>
    @endif

    <!-- Hero -->
    <div class="text-center bg-image"
        style="
    background-image: url('https://statik.unesa.ac.id/profileunesa_konten_statik/uploads/pusdippket/thumbnail/a6bf8cce-e619-46de-9715-d3b2b90e6512.jpg');height: 400px;">
        <div class="mask h-100" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <div class="h4">ᮝᮤᮜᮥᮏᮩᮀ ᮞᮥᮙ᮪ᮕᮤᮀ ᮓᮤ ᮞᮤᮁᮔᮌᮜᮤᮂ</div>
                    <h1 class="mb-3 fw-bold h1">Wilujeung Sumping di Sirnagalih</h1>
                    <h5 class="fst-italic mb-4s h5">"Dituntun ku santun, dipiara ku rasa, dilatih peurih, diasuh
                        lungguh, diasah ku kanyaah, disipuh ku karipuh."</h5>
                    <a data-mdb-ripple-init class="btn btn-outline-light mt-3" href="#!"
                        role="button">Selengkapnya<i class="fas fa-paper-plane ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero -->

    {{-- Layanan --}}
    <div class="container-fluid">
        <div class="container p-5">
            <div class="text-center mb-5">
                <h1 class="fw-bold">Layanan Surat</h1>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-3">
                @forelse ($surats as $surat)
                    <div class="col">
                        <a href="{{ route('createPermohonan', ['nama_surat' => $surat->nama_surat]) }}" class="link-decoration">
                            <div class="card card-grow bg-transparent">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="border border-3 border-primary rounded-4 mx-auto mb-3 d-flex align-items-center p-3"
                                            style="width: 200px;">
                                            <h1 class="mx-auto fw-bold text-uppercase">{{ $surat->singkatan }}</h1>
                                        </div>
                                        {{-- <img src="{{ asset('assets/img/skck.png') }}" alt="" style="width: 200px" class="mb-3"> --}}
                                        <h4 class="fw-bold">{{ $surat->nama_surat }}</h4>
                                        <p class="card-text">{!! Str::limit($surat->desc, 100) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                <p class="alert alert-danger  text-center mx-auto">
                    Layanan belum tersedia. 
                </p>
                @endforelse
            </div>

            <div class="mt-5 text-center">
                <a href="{{ route('layanan') }}" class="fw-bold fs-5">Lihat semua Layanan<i
                    class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>

    {{-- Bank Sampah --}}
    <div class="container-fluid" style="background-color: rgb(255, 248, 248, 0.6)">
        <div class="container p-5">
            <div class="row align-items-center justify-content-between gap-5">
                <div class="col">
                    <img src="{{ asset('assets/img/banksampah.png') }}" alt="" class="w-100">
                </div>
                <div class="col">
                    <h2 class="fw-bold">Kamu bisa dapat Uang dengan mengikuti program Bank Sampah</h4>
                        <p class="my-3">Hey, kabar baik! dengan mengikuti program Bank Sampah, kamu bisa dapat uang
                            lho. Ayo ikuti sekarang!</p>
                        <a href="{{ route('bankSampah') }}" class="btn btn-success card-grow fw-bold mt-3" style="background-image: linear-gradient(to right, #0a9659 0%, #3cba53 100%);">
                            Ikuti Sekarang<i class="fas fa-paper-plane ms-2"></i></a>
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
                    <a href="{{ route('berita') }}" class="fw-bold">Lihat semua <i
                            class="fas fa-arrow-right ms-2"></i></a>
                </div>
                <div class="col-4">
                    @foreach ($post as $item)
                        <img src="{{ Storage::url($item->image) }}" class="rounded w-100" alt="...">
                        <div class="mt-3">
                            <h4 class="fw-bold">{{ $item->title }}</h5>
                                <p class="card-text">
                                    <small class="text-secondary">
                                        <i
                                            class="fas fa-calendar-alt me-2"></i>{{ $item->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{!! Str::limit($item->content, 200) !!}
                                    <span>
                                        <a href="{{ route('show', $item->slug) }}">Baca selengkapnya</a>
                                    </span>
                                </p>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="row row-cols-1 row-cols-md-2 g-5">
                    @foreach ($posts as $post)
                        <div class="col">
                            <a href="" class="link-decoration">
                                <div class="ratio ratio-16x9 mb-2">
                                    <img src="{{ Storage::url($post->image) }}"
                                        alt=""class="rounded object-fit-cover">
                                </div>
                                <p><b>{{ $post->title }} </b><br>
                                    <span>
                                        <small>{!! Str::limit($post->content, 100) !!}
                                            <span>
                                                <a href="">baca selengkapnya</a></span></small>
                                    </span>
                                </p>
                            </a>
                        </div>
                    @endforeach
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
                        <img src="{{ asset('assets/img/undraw_small_town_re_7mcn.svg') }}" alt=""
                            class="w-75">
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
                        <img src="{{ asset('assets/img/undraw_off_road_re_leme.svg') }}" alt=""
                            class="w-50">
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
                        <img src="{{ asset('assets/img/undraw_celebration_re_kc9k.svg') }}" alt=""
                            class="w-50">
                    </div>
                    <div class="mt-auto">
                        <h4 class="fw-bold">31 Rukun Tangga (RT)</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto, animi.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 text-center">
            <a href="" class="fw-bold fs-5">Lihat semua statistik<i
                    class="fas fa-arrow-right ms-2"></i></a>
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
                <button class="btn btn-primary fw-bold mx-auto">Kirim<i class="fas fa-paper-plane ms-2"></i></button>
            </div>
        </div>
    </section>
</div>
</div>
