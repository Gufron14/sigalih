<?php

use Livewire\Livewire;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Layanan\Surat\Update;
use App\Livewire\Admin\Layanan\Pengajuan\Show;
use App\Livewire\Admin\Layanan\Surat\Index as SuratIndex;

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
Route::get('berita', \App\Livewire\Berita\Index::class)->name('berita'); // Berita
Route::get('berita/{id}', \App\Livewire\Berita\Show::class)->name('show'); // Show Berita (Slug or ID)

// Auth
Route::get('login', \App\Livewire\Auth\UserAuth::class)->name('login');
Route::get('register', \App\Livewire\Auth\UserAuth::class)->name('register');

// Route::group(['middleware' => 'user-auth'], function () {

    Route::get('logout', \App\Livewire\Auth\UserAuth::class)->name('logout'); // Logout
    
    // Layanan
    Route::get('layanan', \App\Livewire\Layanan\Index::class)->name('layanan');
    Route::get('layanan/{id}', \App\Livewire\Layanan\Create::class)->name('createSurat');

    // Bank Sampah
    Route::get('bank-sampah', \App\Livewire\BankSampah\Index::class)->name('bankSampah');
    Route::prefix('bank-sampah/')->group(function() {
        Route::get('riwayat', \App\Livewire\BankSampah\Riwayat::class)->name('riwayat');
        Route::get('tukar-saldo', \App\Livewire\BankSampah\TukarSaldo::class)->name('tukarSaldo');
        Route::get('riwayat-penukaran', \App\Livewire\BankSampah\RiwayatPenukaran::class)->name('riwayatPenukaran');
        Route::get('panduan', \App\Livewire\BankSampah\Panduan::class)->name('panduan');
    });


// });
    

/** BACK END
 * Admin Panel
 * 
 * 
 */

Route::prefix('admin')->group(function () {

    // Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::prefix('layanan')->group(function () {

        // LAYANAN SURAT
        // Surat
        Route::get('surat', SuratIndex::class)->name('surat.index');
        Route::get('surat/create', \App\Livewire\Admin\Layanan\Surat\Create::class)->name('surat.create');
        Route::get('surat/{id}/update', Update::class)->name('update');
        // Route::get('surat', [SuratController::class, 'index'])->name('lihat-surat');
        // Route::post('surat/add', [SuratController::class, 'store'])->name('surat.store');
        // Route::put('surat/update/{id}', [SuratController::class, 'update'])->name('surat.update');
        // Route::delete('surat/delete/{id}', [SuratController::class, 'destroy'])->name('surat.delete');
    
        Route::get('pengajuan', \App\Livewire\Admin\Layanan\Pengajuan\Index::class)->name('pengajuan');
    
        // Pengajuan
        // Route::get('pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
        Route::get('pengajuan/{id}', Show::class)->name('view-pengajuan');
        // Route::get('wordExport/{id}', [PengajuanController::class, 'wordExport'])->name('wordExport');
        // Route::get('/pengajuan/{jenis}/{id}', 'PengajuanController@createSurat')->name('wordExport');

        Route::get('CreatePDF/{id}', Show::class)->name('CreatePDF');

    });

});

