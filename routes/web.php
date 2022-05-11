<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Servers\ServerController;
use App\Http\Controllers\User\LoggedUserController;
use App\Http\Controllers\Servers\LogFilePathController;
use App\Http\Controllers\Servers\ServerCronTabController;
use App\Http\Controllers\Servers\ServerConfigDataController;
use App\Http\Controllers\Servers\ServerReadFileController;

Route::view('/', 'welcome');

Route::prefix('login')->group(function () {
    Route::get('', [AuthController::class, 'show'])->name('login');
    Route::post('', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('', [LoggedUserController::class, 'show']);
    });

    Route::prefix('servers')->group(function () {
        Route::get('', [ServerController::class, 'index']);
        Route::get('{server}', [ServerController::class, 'show']);
        Route::get('{server}/config-datas', [ServerConfigDataController::class, 'show']);
        Route::get('{server}/crontab', [ServerCronTabController::class, 'show']);
        Route::post('', [ServerController::class, 'store']);
        Route::prefix('{server}/logfiles')->group(function() {
            Route::get('read/{logFilePath}', ServerReadFileController::class);
            Route::post('', [LogFilePathController::class, 'store']);
        });
    });
});
