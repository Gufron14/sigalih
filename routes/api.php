<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\AuthSanctumController;

Route::post('register', [AuthSanctumController::class, 'register']);
Route::post('login', [AuthSanctumController::class, 'login']);
Route::post('logout', [AuthSanctumController::class, 'logout']);


// CRUD Surat
Route::group(['middleware' => 'api', 'prefix' => 'surat'], function ($router) {
    Route::get('index', [SuratController::class, 'index']);
    Route::post('create', [SuratController::class, 'store']);
    Route::get('show/{id}', [SuratController::class, 'show']);
    Route::put('update/{id}', [SuratController::class, 'update']);
    Route::delete('delete/{id}', [SuratController::class, 'destroy']);
});