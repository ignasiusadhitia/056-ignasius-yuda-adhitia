@extends('partials.layouts.app')

@section('title', 'Leaderboard')

@section('content')
    <div class="section-wrapper">

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

                <div class="rank-item {{ $score->user_id == $currentUserId ? 'highlight' : '' }}">
                    <div>{{ $index + 1 }}.</div>
                    <x-user-avatar :user="$score->user" />
                    <div>{{ $score->user_id == $currentUserId ? 'You' : $score->user->name }}</div>
                    <div>{{ $score->score }}pts</div>
                </div>
            @endforeach

            @if (!$isCurrentUserInTop10 && $userRank && $currentUserScore !== null)
                <div class="rank-item highlight">
                    <div>{{ $userRank }}.</div>
                    <x-user-avatar :user="$currentUser" />
                    <div>You</div>
                    <div>{{ $currentUserScore }}pts</div>
                </div>
            @endif
        </div>

    </div>
@endsection
