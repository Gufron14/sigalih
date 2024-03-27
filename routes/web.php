<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/berita', function () {
    return view('berita');
});
Route::get('/tentang', function () {
    return view('tentang');
});
Route::get('/sejarah', function () {
    return view('sejarah');
});
  
Route::get('/viewberita', function () {
    return view('viewberita');
});
  