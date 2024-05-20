@extends('partials.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <section class="section-wrapper">
        <h1>Dashboard</h1>

        <div class="user-wrapper">
            <div class="greeting-wrapper">
                <div>
                    <h2>Hi, {{ auth()->user()->name }}</h2>
                    <p>Let's make this day productive</p>
                </div>
                @if (auth()->user()->image)
                    <img src="{{ asset('assets/images/' . auth()->user()->image) }}" alt="profile-photo">
                @endif
            </div>

            <div class="rank-wrapper">
                <div>
                    <span>Rank</span>
                    <span>12</span>
                </div>

                <div>
                    <span>Points</span>
                    <span>{{ auth()->user()->score->score }}pts</span>
                </div>
            </div>
        </div>

        <div class="menu-wrapper">
            <h2>Whatcha gonna do now?</h2>

            <div class="menu">
                <a href="{{ route('trivia.question') }}" class="menu-item">
                    <span>
                        Play
                    </span>
                </a>
                <a href="{{ route('questions.index') }}" class="menu-item">
                    <span>
                        My Question
                    </span>
                </a>
                <a href="{{ route('profile') }}" class="menu-item">
                    <span>
                        My Profile
                    </span>
                </a>
                <a href="{{ route('trivia.leaderboard') }}" class="menu-item">
                    <span>
                        Leaderboard
                    </span>
                </a>
            </div>
        </div>

    </section>

@endsection
