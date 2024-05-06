<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function () {
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register'])->name('register');

    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
