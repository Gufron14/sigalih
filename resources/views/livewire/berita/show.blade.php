<div class="container mt-5">
    <div class="col d-flex align-items-center justify-content-end mb-5">
        <form class="d-flex w-100" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari berita" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>
    </div>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/berita">Kabar Sirnagalih</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori Berita</li>
        </ol>
    </nav>

    {{-- Body --}}
    <div class="row mt-3">
        <div class="col-8">
            <h2 class="fw-bold">Soal Gaji Kades dan Perangkat di Purworejo yang Terlambat, Ini
                Penjelasan OPD Terkait</h2>
            <p><i class="fas fa-calendar-alt text-secondary"></i>&nbsp;Kamis, 28 Maret 2023 &nbsp;&nbsp; <i class="fas fa-user text-secondary"></i>&nbsp;Admin</p>
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
            <h5 class="fw-bold mb-3">Komentar</h5>
            <form action="">
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-user-circle fs-1 text-secondary"></i>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Komentar Anda">
                    </div>
                    <div class="col-auto">
                        <div class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </form>
            <hr class="text-secondary">
            <div class="row">
                <div class="col-auto">
                    <i class="fas fa-user-circle fs-1 text-secondary"></i>
                </div>
                <div class="col">
                    <p class="align-items-center fw-bold">Anonymous</p>
                    <p>Parah Banget Jir</p>
                    <a href="">
                        <small>Suka</small> 
                        <small>Balas</small>
                    </a>
                </div>
            </div>
            <hr class="text-secondary">

        </div>
        <div class="col">
            <h5 class="mb-3">Kabar Lainnya</h5>
            <div class="row gap-3">
                @for ($i = 0; $i < 7; $i++)
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