<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TriviaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return view('welcome');
})->name('welcome');

Route::group(['middleware' => ['guest']], function () {
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register'])->name('register');
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::match(['get', 'post'], 'profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('questions', QuestionController::class)->except('show');
    Route::get('/questions/answered', [QuestionController::class, 'answeredQuestions'])->name('questions.answered');


    Route::prefix('trivia')->group(function () {
        Route::get('/', [TriviaController::class, 'showQuestion'])->name('trivia.index');
        Route::post('/answer', [TriviaController::class, 'submitAnswer'])->name('trivia.answer');
    });

    Route::get('leaderboard', [TriviaController::class, 'showLeaderboard'])->name('leaderboard');
});
