<?php

use App\Http\Controllers\ViewController;
use App\Livewire\Admin\Berita\Create;
use App\Livewire\Admin\Berita\Index;
use App\Livewire\Admin\Layanan\JenisSurat\CreateJenisSurat;
use Livewire\Livewire;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Layanan\JenisSurat\Index as JenisSuratIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Layanan\Surat\Update;
use App\Livewire\Admin\Layanan\Pengajuan\Show;
use App\Livewire\Admin\Layanan\Surat\Index as SuratIndex;
use App\Livewire\BankSampah\Backend\Dashboard as BackendDashboard;
use App\Livewire\BankSampah\Backend\Sampah\Index as SampahIndex;
use App\Livewire\BankSampah\Backend\Sampah\RiwayatSetoran;
use App\Livewire\BankSampah\Backend\Sampah\SetorSampah;
use App\Livewire\Layanan\SuratForm;

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/laravel/myproject/vendor/livewire/livewire.js', $handle);
});

Route::get('surat-form', SuratForm::class)->name('JenisSurat');

/** FRONT END
 * Beranda
 * Berita
 * Layanan
* Bank Sampah
 */

Route::get('/', \App\Livewire\Home::class)->name('home'); // Beranda
Route::get('berita', \App\Livewire\Berita\Index::class)->name('berita'); // Berita
Route::get('berita/{slug}', \App\Livewire\Berita\Show::class)->name('show'); // Show Berita (Slug or ID)

// Auth
Route::middleware('guest')->group(function(){
    Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
});

// Route::middleware(['auth:sanctum', 'auth.token'])->group( function () {

    Route::get('logout', \App\Livewire\Auth\Logout::class)->name('logout')->middleware('auth'); // Logout
    
    // Layanan
    Route::get('layanan', \App\Livewire\Layanan\Index::class)->name('layanan')->middleware('auth');
    Route::get('layanan/{nama_surat}', \App\Livewire\Layanan\CreateRequestSurat::class)->name('createPermohonan');

    // Bank Sampah
    Route::get('bank-sampah', \App\Livewire\BankSampah\Index::class)->name('bankSampah')->middleware('auth');
    Route::prefix('bank-sampah/')->group(function() {
        Route::get('riwayat', \App\Livewire\BankSampah\Riwayat::class)->name('riwayat');
        Route::get('tukar-saldo', \App\Livewire\BankSampah\TukarSaldo::class)->name('tukarSaldo');
        Route::get('riwayat-penukaran', \App\Livewire\BankSampah\RiwayatPenukaran::class)->name('riwayatPenukaran');
        Route::get('panduan', \App\Livewire\BankSampah\Panduan::class)->name('panduan');
    });


// });

Route::get('test', [ViewController::class, 'test'])->name('test');
    

/** BACK END
 * Admin Panel
 * Bank Sampah
 * 
 */

//  Admin
Route::prefix('admin')->group(function () {
    
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::get('berita', Index::class)->name('admin.berita');
    Route::get('berita/create', Create::class)->name('createBerita');
    Route::get('berita/update/{id}', \App\Livewire\Admin\Berita\Update::class)->name('updateBerita');

    Route::prefix('layanan')->group(function () {

        // LAYANAN SURAT
        // Surat
        //Route::get('surat', SuratIndex::class)->name('surat.index');
        Route::get('surat/create', \App\Livewire\Admin\Layanan\Surat\Create::class)->name('surat.create');
        Route::get('surat/{id}/update', Update::class)->name('update');
        // Route::get('surat', [SuratController::class, 'index'])->name('lihat-surat');
        // Route::post('surat/add', [SuratController::class, 'store'])->name('surat.store');
        // Route::put('surat/update/{id}', [SuratController::class, 'update'])->name('surat.update');
        // Route::delete('surat/delete/{id}', [SuratController::class, 'destroy'])->name('surat.delete');
        Route::get('surat', JenisSuratIndex::class)->name('surat');
        Route::get('surat/create-jenis-surat', CreateJenisSurat::class)->name('createSurat');
    
        Route::get('pengajuan', \App\Livewire\Admin\Layanan\Pengajuan\Index::class)->name('pengajuan');
    
        // Pengajuan
        // Route::get('pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
        Route::get('pengajuan/{id}', Show::class)->name('view-pengajuan');
        // Route::get('wordExport/{id}', [PengajuanController::class, 'wordExport'])->name('wordExport');
        // Route::get('/pengajuan/{jenis}/{id}', 'PengajuanController@createSurat')->name('wordExport');

        Route::get('CreatePDF/{id}', Show::class)->name('CreatePDF');

    });

});

// Bank Sampah Admin
Route::prefix('bs-admin')->group(function(){
    Route::get('dashboard', BackendDashboard::class);
    Route::get('sampah', SampahIndex::class)->name('jenisSampah');
    Route::get('setor-sampah', SetorSampah::class)->name('setorSampah');
    Route::get('riwayat-setoran', RiwayatSetoran::class)->name('riwayatSetoran');
});


