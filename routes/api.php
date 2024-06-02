<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('logout',  'logout');
        Route::get('user', 'user');
    });

    Route::prefix('articles')->group(function () {
        Route::controller(ArticleController::class)->group(function () {
            Route::get('index', 'index');
            Route::get('prices', 'getPrices');
            Route::post('store', 'store');
            Route::get('show/{id}', 'show');
            Route::put('update/{id}', 'update');
            Route::delete('destroy/{id}', 'destroy');
        });
    });
    Route::prefix('depots')->group(function () {
        Route::controller(DepotController::class)->group(function () {
            Route::get('index', 'index');
            Route::post('store', 'store');
            Route::get('show/{id}', 'show');
            Route::put('update/{id}', 'update');
            Route::delete('destroy/{id}', 'destroy');
        });
    });
    Route::prefix('prices')->group(function () {
        Route::controller(PriceController::class)->group(function () {
            Route::get('index', 'index');
            Route::post('store', 'store');
            Route::get('show/{id}', 'show');
            Route::put('update/{id}', 'update');
            Route::delete('destroy/{id}', 'destroy');
        });
    });
});
