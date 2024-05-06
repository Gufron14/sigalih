<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Admin\PengajuanController;

Route::group(['middleware' => 'api', 'prefix' => 'user'], function ($router) {

    Route::post('register', [UserAuthController::class, 'register'])->name('doRegister'); // Do Login
    Route::post('login', [UserAuthController::class, 'login'])->name('doLogin'); // Do Register
    
    Route::post('logout', [UserAuthController::class, 'logout']);
    Route::post('refresh', [UserAuthController::class, 'refresh']);
    Route::post('me', [UserAuthController::class, 'me']);

});