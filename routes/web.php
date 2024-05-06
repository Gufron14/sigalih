<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengajuanController;
use App\Http\Controllers\UserAuthController;

// Post
Route::prefix('admin/posts')->group(function () {
    Route::get('index', [PostController::class, 'index'])->name('posts'); // Show List Post Page
    Route::get('create', [PostController::class, 'create']); // Show Create Post Page
    Route::post('create', [PostController::class, 'store'])->name('posts.store'); // Do Create Post

    Route::get('edit/{post}', [PostController::class, 'edit'])->name('posts.edit'); // Show Edit Post Page
    Route::put('edit/{post}', [PostController::class, 'update'])->name('posts.update'); // Do Update Post

    Route::delete('list/{post}', [PostController::class, 'destroy'])->name('posts.delete'); // Do Delete Post
});

// WEBSITE
Route::get('/', [ViewController::class, 'index'])->name('index');

// LAYANAN
Route::get('layanan', [LayananController::class, 'index']);

// Auth
Route::get('login', [ViewController::class, 'viewLogin'])->name('view-login');
Route::get('register', [ViewController::class, 'viewRegister'])->name('registerPage');



Route::prefix('admin/')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'dashboard']);

    // LAYANAN SURAT
    // Surat
    Route::get('surat', [SuratController::class, 'index'])->name('surat');
    Route::post('surat/add', [SuratController::class, 'store'])->name('surat.store');
    Route::get('surat/{id}', [SuratController::class, 'show']);
    Route::put('surat/update/{id}', [SuratController::class, 'update']);
    Route::delete('surat/delete/{id}', [SuratController::class, 'destroy']);

    // Pengajuan
    Route::get('pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
});

Route::get('layanan', [LayananController::class, 'show'])->name('layanan');
Route::post('layanan/pengajuan', [PengajuanController::class, 'store']);
Route::get('surat/surat', [PengajuanController::class, 'index'])->name('surat');
Route::post('layanan/index', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::get('surat/surat/{id}', [PengajuanController::class, 'show'])->name('view-surat');

Route::get('warga/wordExport/{id}', [WargaController::class, 'wordExport']);
