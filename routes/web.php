<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function () {
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register'])->name('register');
});
