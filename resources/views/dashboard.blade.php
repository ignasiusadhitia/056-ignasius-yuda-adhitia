@extends('partials.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <section class="section-wrapper">
        <div class="user-wrapper">
            <div class="greeting-wrapper">
                <div>
                    <h2>Hi, {{ auth()->user()->name }}</h2>
                    <p>Let's make this day productive</p>
                </div>
                <a href="profile">
                    <x-user-avatar :user="auth()->user()" />
                </a>
            </div>

            <h2>Track Your Stats</h2>
            <div class="stats-wrapper">
                @php
                    $currentUser = auth()->user();
                    $currentUserScore = $currentUser->score ? $currentUser->score->score : null;
                @endphp

                @if ($currentUserScore !== null && $userRank !== null)
                    <div class="stats-item">
                        <div class="number-wrapper">
                            <span>{{ $userRank }}</span>
                        </div>
                        <span>Rank</span>
                    </div>

                    <div class="stats-item">
                        <div class="number-wrapper">
                            <span>{{ $currentUserScore }}</span>
                        </div>
                        <span>Points</span>
                    </div>
                @endif

                @if ($createdQuestionsCount > 0)
                    <div class="stats-item">
                        <div class="number-wrapper">
                            <span>{{ $createdQuestionsCount }}</span>
                        </div>
                        <span>Created Questions</span>
                    </div>
                @endif

                @if ($answeredQuestionsCount > 0)
                    <div class="stats-item">
                        <div class="number-wrapper">
                            <span>{{ $answeredQuestionsCount }}</span>
                        </div>
                        <span>Answered Questions</span>
                    </div>
                @endif

            </div>
            @if ($currentUserScore == null && $createdQuestionsCount == 0)
                <p class="no-stats-message">Hmm... nothing to show. Please play some trivia or create some questions!
                </p>
            @endif


        </div>

        <div class="menu-section">
            <h2>Whatcha gonna do now?</h2>
            <div class="menu-item-wrapper">
                <nav>
                    <ul>
                        <li>
                            <a href="{{ route('questions.create') }}" class="menu-item">
                                <span class="icon-wrapper">
                                    <i class="fa-solid fa-plus"></i>
                                </span>
                                <span>Create Questions</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('questions.index') }}" class="menu-item">
                                <span class="icon-wrapper">
                                    <i class="fa-solid fa-question"></i>
                                </span>
                                <span>My Questions</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('trivia.index') }}" class="menu-item">
                                <span class="icon-wrapper">
                                    <i class="fas fa-play"></i>
                                </span>
                                <span>Play</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('questions.answered') }}" class="menu-item">
                                <span class="icon-wrapper">
                                    <i class="fa-solid fa-reply"></i>
                                </span>
                                <span>Answered Questions</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('leaderboard') }}" class="menu-item">
                                <span class="icon-wrapper">
                                    <i class="fa-solid fa-award"></i>
                                </span>
                                <span>Leaderboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}">
                                <span class="icon-wrapper">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <span class="icon-wrapper">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                                <span>Logout</span>
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </section>

@endsection
