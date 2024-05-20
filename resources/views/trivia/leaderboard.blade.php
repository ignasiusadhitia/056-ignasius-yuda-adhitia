@extends('partials.layouts.app')

@section('title', 'Leaderboard')

@section('content')
    <div class="section-wrapper">
        <h1>Leaderboard</h1>

        <div class="rank-wrapper">
            @php
                $isCurrentUserInTop10 = false;
                $currentUserId = auth()->id();
                $currentUser = auth()->user();
                $currentUserScore = $currentUser->score ? $currentUser->score->score : null;
            @endphp

            @foreach ($scores as $index => $score)
                @if ($score->user_id == $currentUserId)
                    @php
                        $isCurrentUserInTop10 = true;
                    @endphp
                @endif

                <div class="rank-item">
                    <div>{{ $index + 1 }}.</div>
                    <img src="{{ asset('assets/images/' . $score->user->image) }}" alt="{{ $score->user->name }}">
                    <div>{{ $score->user->name }}</div>
                    <div>{{ $score->score }}pts</div>
                </div>
            @endforeach

            @if (!$isCurrentUserInTop10 && $userRank && $currentUserScore !== null)
                <div class="rank-item">
                    <div>{{ $userRank }}.</div>
                    <img src="{{ asset('assets/images/' . $currentUser->image) }}" alt="{{ $currentUser->name }}">
                    <div>{{ $currentUser->name }}</div>
                    <div>{{ $currentUserScore }}pts</div>
                </div>
            @endif
        </div>

    </div>
@endsection
