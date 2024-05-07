<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
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
    Route::match(['get', 'post'], 'profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
});
