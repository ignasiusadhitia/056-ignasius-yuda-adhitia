<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/questions', function () {
    return view('questions.index');
});

Route::get('/questions/create', function () {
    return view('questions.create');
});

Route::get('/questions/edit/{question}', function () {
    return view('questions.edit');
});

Route::get('/trivia', function () {
    return view('trivia');
});

Route::get('leaderboard', function () {
    return view('leaderboard');
});
