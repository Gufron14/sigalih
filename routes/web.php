<?php

use Livewire\Livewire;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Layanan\Progres;
use App\Livewire\Tentang\Sejarah;
use App\Livewire\Layanan\SuratForm;
use App\Livewire\Admin\Berita\Index;
use App\Livewire\Admin\Berita\Create;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pembangunan\Transparansi;
use App\Livewire\Admin\Layanan\Pengajuan\Show;
use App\Livewire\BankSampah\Backend\Sampah\SetorSampah;
use App\Livewire\BankSampah\Backend\Sampah\UpdateSampah;
use App\Livewire\BankSampah\Backend\Sampah\RiwayatSetoran;
use App\Livewire\Admin\Layanan\JenisSurat\CreateJenisSurat;
use App\Livewire\Admin\Layanan\JenisSurat\UpdateJenisSurat;
use App\Livewire\BankSampah\Backend\Sampah\Index as SampahIndex;
use App\Livewire\BankSampah\Backend\Dashboard as BackendDashboard;
use App\Livewire\Admin\Layanan\JenisSurat\Index as JenisSuratIndex;
use App\Livewire\Auth\Profil;
use App\Livewire\BankSampah\Backend\Nasabah;
use App\Livewire\BankSampah\Backend\Sampah\Transaksi;
use App\Livewire\BankSampah\Index as BankSampahIndex;
use App\Livewire\BankSampah\SyaratKetentuan;
use App\Livewire\Pembangunan\DanaDesa;

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/laravel/myproject/vendor/livewire/livewire.js', $handle);
});

/** FRONT END
 * Beranda
 * Berita
 * Layanan
 * Bank Sampah
 */

Route::get('/', \App\Livewire\Home::class)->name('home'); // Beranda

// Berita
Route::get('berita', \App\Livewire\Berita\Index::class)->name('berita'); // Berita
Route::get('berita/{slug}', \App\Livewire\Berita\Show::class)->name('show'); // Show Berita

// Tentang
Route::prefix('tentang')->group(function () {
    Route::get('sejarah', Sejarah::class)->name('sejarah');
});

// Pembangunan
Route::get('transparansi-dana-desa', DanaDesa::class)->name('dana-desa');

// Auth
Route::middleware('guest')->group(function () {
    Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
});


Route::middleware('auth')->group(function () {
    Route::get('logout', \App\Livewire\Auth\Logout::class)->name('logout');
    Route::get('user-profil', Profil::class)->name('profil');
});
    
// Layanan

Route::get('layanan', \App\Livewire\Layanan\Index::class)->name('layanan');
Route::prefix('layanan')->group(function () {
    Route::get('{nama_surat}', \App\Livewire\Layanan\CreateRequestSurat::class)
        ->name('createPermohonan')
        ->middleware('auth');
    Route::get('progres', Progres::class)->name('progres')->middleware('auth');
}); 

// Bank Sampah
Route::get('bank-sampah', BankSampahIndex::class)->name('bankSampah')->middleware('auth');
Route::prefix('bank-sampah')->group(function () {
    Route::get('syarat&ketentuan', SyaratKetentuan::class)->name('syaratKetentuan');
    Route::get('riwayat', \App\Livewire\BankSampah\Riwayat::class)->name('riwayat');
    Route::get('tukar-saldo', \App\Livewire\BankSampah\TukarSaldo::class)->name('tukarSaldo');
    Route::get('pendapatan', \App\Livewire\BankSampah\Pendapatan::class)->name('pendapatan');
    Route::get('riwayat-penukaran', \App\Livewire\BankSampah\RiwayatPenukaran::class)->name('riwayatPenukaran');
    Route::get('panduan', \App\Livewire\BankSampah\Panduan::class)->name('panduan');
});


/** BACK END
 * Admin Panel
 * Bank Sampah
 *
 */

//  Admin
Route::prefix('admin')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    // BERITA
    Route::get('berita', Index::class)->name('admin.berita');
    Route::get('berita/create', Create::class)->name('createBerita');
    Route::get('berita/update/{id}', \App\Livewire\Admin\Berita\Update::class)->name('updateBerita');

    // LAYANAN SURAT
    // Surat
    Route::get('surat', JenisSuratIndex::class)->name('surat');
    Route::get('surat/create-jenis-surat', CreateJenisSurat::class)->name('createSurat');
    Route::get('surat/update-jenis-surat/{id}', UpdateJenisSurat::class)->name('updateSurat');

    // Pengajuan
    Route::get('pengajuan', \App\Livewire\Admin\Layanan\Pengajuan\Index::class)->name('pengajuan');
    Route::get('pengajuan/{id}', Show::class)->name('view-pengajuan');

    // TRANSPARANSI
    Route::get('transparansi', \App\Livewire\Admin\Transparansi\Index::class)->name('transparan');
    Route::get('transparansi/create', \App\Livewire\Admin\Transparansi\Create::class)->name('createTransparan');
    Route::get('transparansi/update/{id}', \App\Livewire\Admin\Transparansi\Update::class)->name('updateTransparan');
});

// Bank Sampah Admin
Route::prefix('bs-admin')->group(function () {
    Route::get('dashboard', BackendDashboard::class);
    Route::get('sampah', SampahIndex::class)->name('jenisSampah');
    Route::get('sampah/{id}', UpdateSampah::class)->name('editSampah');
    Route::get('setor-sampah', SetorSampah::class)->name('setorSampah');
    Route::get('riwayat-setoran', RiwayatSetoran::class)->name('riwayatSetoran');
    Route::get('transaksi', Transaksi::class)->name('transaksi');
    Route::get('nasabah', Nasabah::class)->name('nasabah');
});
