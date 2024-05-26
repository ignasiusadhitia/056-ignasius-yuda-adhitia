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
                <x-user-avatar :user="auth()->user()" />
            </div>

            <div class="rank-wrapper">
                @php
                    $currentUser = auth()->user();
                    $currentUserScore = $currentUser->score ? $currentUser->score->score : null;
                @endphp

                @if ($currentUserScore !== null && $userRank)
                    <div>
                        <span>Rank</span>
                        <span>{{ $userRank }}</span>
                    </div>

                    <div>
                        <span>Points</span>
                        <span>{{ $currentUserScore }}pts</span>
                    </div>
                @else
                    <p>You do not have a rank yet, Play some trivia games to earn points!</p>
                @endif
            </div>
        </div>

    </section>

@endsection
