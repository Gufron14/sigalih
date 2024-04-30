<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// --------------------------- User Authentication -------------------------------
Route::group(['prefix' => 'user'], function ($router) {
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