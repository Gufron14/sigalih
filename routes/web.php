<?php

use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

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
Route::get('layanan/index', [LayananController::class, 'index']);

// BANK SAMPAH
Route::get('banksampah/index', [BankSampahController::class, 'index']);

// ------------------------------------------------- USER ROUTE -------------------------------------------------