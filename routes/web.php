<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengajuanController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Layanan\Surat\Create;
use App\Livewire\Admin\Layanan\Surat\Index as SuratIndex;
use App\Livewire\Admin\Layanan\Surat\Update;
use App\Livewire\Layanan\Index;


// Auth

/** FRONT END
 * Beranda
 * Berita
 * Layanan
* Bank Sampah
 */

Route::get('/', \App\Livewire\Home::class)->name('home'); // Beranda
Route::get('berita', \App\Livewire\Berita\Index::class)->name('berita'); // Berita
Route::get('berita/{id}', \App\Livewire\Berita\Show::class)->name('show'); // Show Berita (Slug or ID)

Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
Route::get('logout', \App\Livewire\Auth\Logout::class)->name('logout'); // Logout

// Layanan
Route::group(['middleware' => 'user-auth'], function () {
    Route::get('layanan', Index::class)->name('layanan'); // Layanan Page
});
    Route::get('layanan/create-surat/{id}', [LayananController::class, 'create'])->name('create.surat');
    Route::post('layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('layanan/progres/{id}', [LayananController::class, 'progres'])->name('progres');


/** BACK END
 * Admin Panel
 * 
 * 
 */

Route::prefix('admin/')->group(function () {

    // Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    // LAYANAN SURAT
    // Surat
    Route::get('surat', SuratIndex::class)->name('surat.index');
    Route::get('surat/create', Create::class)->name('surat.create');
    Route::get('surat/{id}/update', Update::class)->name('update');
    // Route::get('surat', [SuratController::class, 'index'])->name('lihat-surat');
    // Route::post('surat/add', [SuratController::class, 'store'])->name('surat.store');
    // Route::put('surat/update/{id}', [SuratController::class, 'update'])->name('surat.update');
    // Route::delete('surat/delete/{id}', [SuratController::class, 'destroy'])->name('surat.delete');

    Route::get('pengajuan', \App\Livewire\Admin\Layanan\Pengajuan\Index::class)->name('pengajuan');

    // Pengajuan
    // Route::get('pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
    // Route::get('pengajuan/{id}', [PengajuanController::class, 'show'])->name('view-pengajuan');
    // Route::get('wordExport/{id}', [PengajuanController::class, 'wordExport'])->name('wordExport');
    // Route::get('/pengajuan/{jenis}/{id}', 'PengajuanController@createSurat')->name('wordExport');

});

