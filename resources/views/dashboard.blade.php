<<<<<<< HEAD
@extends('layouts.layout')

@section('title', 'Dashboard Page')

@section('content')

    <h2>Hi {{ auth()->user()->name }}, Welcome to Jabar Trivia</h2>

    @if (auth()->user()->image)
        <img src="{{ asset('images/' . auth()->user()->image) }}" alt="profile" />
    @endif

    <a href="{{ route('trivia.question') }}">Play</a>
=======
@extends('partials.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <section class="section-wrapper">
        <h1>Dashboard</h1>

        <div class="user-wrapper">
            <div class="greeting-wrapper">
                <div>
                    <h2>Hi, User 1</h2>
                    <p>Let's make this day productive</p>
                </div>
                <img src="{{ asset('assets/images/avatar-1.jpg') }}" alt="user-1">
            </div>

            <div class="rank-wrapper">
                <div>
                    <span>Rank</span>
                    <span>12</span>
                </div>

                <div>
                    <span>Points</span>
                    <span>100</span>
                </div>
            </div>
        </div>

        <div class="menu-wrapper">
            <h2>Whatcha gonna do now?</h2>

            <div class="menu">
                <div class="menu-item">
                    <span>
                        Play Trivia
                    </span>
                </div>
                <div class="menu-item">
                    <span>
                        Create Question
                    </span>
                </div>
                <div class="menu-item">
                    <span>
                        Edit Profile
                    </span>
                </div>
                <div class="menu-item">
                    <span>
                        See Leaderboard
                    </span>
                </div>
            </div>
        </div>

    </section>
>>>>>>> 86f418071df7aeb26dc3ee0dddde2e6864224544

@endsection
