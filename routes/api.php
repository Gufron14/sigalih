<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// --------------------------- User Authentication -------------------------------
Route::group(['middleware' => 'api','prefix' => 'user'], function ($router) {
        Route::post('register', [UserController::class, 'register']);
        Route::post('login', [UserController::class, 'login']);
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('refresh', [UserController::class, 'refresh']);
        Route::post('me', [UserController::class, 'me']);
    },
);
// --------------------------- User Authentication -------------------------------

// --------------------------- Admin Authentication -------------------------------
// --------------------------- Admin Authentication -------------------------------