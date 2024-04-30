<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JenisSuratController;

// Post
Route::prefix('admin/posts')->group(function(){
    Route::get('index', [PostController::class, 'index'])->name('posts'); // Show List Post Page
    Route::get('create', [PostController::class, 'create']); // Show Create Post Page
    Route::post('create', [PostController::class, 'store'])->name('posts.store'); // Do Create Post

    Route::get('edit/{post}', [PostController::class, 'edit'])->name('posts.edit'); // Show Edit Post Page
    Route::put('edit/{post}', [PostController::class, 'update'])->name('posts.update'); // Do Update Post

    Route::delete('list/{post}', [PostController::class, 'destroy'])->name('posts.delete'); // Do Delete Post
});

// ------------------------------------------------- USER ROUTE -------------------------------------------------
// WEBSITE
Route::get('/', [ViewController::class, 'index'])->name('index');

// LAYANAN
Route::get('layanan', [LayananController::class, 'index']);

// BANK SAMPAH
Route::get('banksampah/index', [BankSampahController::class, 'index']);

// ------------------------------------------------- USER ROUTE -------------------------------------------------


// ------------------------------------------------- ADMIN ROUTE -------------------------------------------------
// CMS
Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

// SURAT
Route::prefix('admin/')->group(function(){
    Route::get('surat/jenis-surat', [JenisSuratController::class, 'index'])->name('jenis-surat');
    Route::post('surat/jenis-surat', [JenisSuratController::class, 'store'])->name('jenisSurat.store');
    
    Route::get('surat/surat', [SuratController::class, 'index'])->name('surat');
    Route::post('layanan/index', [SuratController::class, 'store'])->name('surat.store');
    Route::get('surat/surat/{id}', [SuratController::class, 'show'])->name('view-surat');
    
    Route::get('warga/index', [WargaController::class, 'index'])->name('warga');
    Route::get('warga/show/{id}', [WargaController::class, 'show']);
});

Route::get('surat/wordExport/{id}', [SuratController::class, 'wordExport']);

// Kependudukan

// ------------------------------------------------- ADMIN ROUTE -------------------------------------------------



Route::get('warga/wordExport/{id}', [WargaController::class, 'wordExport']);

