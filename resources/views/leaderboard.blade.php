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

            <div class="top-three-wrapper">
                @foreach ($scores as $index => $score)
                    @break($index >= 3)

                    @php
                        if ($score->user_id == $currentUserId) {
                            $isCurrentUserInTop10 = true;
                        }
                    @endphp

                    <x-rank-item :index="$index" :user="$score->user" :score="$score->score" :highlight="$score->user_id == $currentUserId"
                        :isCurrentUser="$score->user_id == $currentUserId" />
                @endforeach
            </div>

            <div class="remaining-wrapper">
                @foreach ($scores as $index => $score)
                    @continue($index < 3)
                    @break($index > 10)

                    @php
                        if ($score->user_id == $currentUserId) {
                            $isCurrentUserInTop10 = true;
                        }
                    @endphp

                    <x-rank-item :index="$index" :user="$score->user" :score="$score->score" :highlight="$score->user_id == $currentUserId"
                        :isCurrentUser="$score->user_id == $currentUserId" />
                @endforeach
            </div>

            @if (!$isCurrentUserInTop10 && $userRank && $currentUserScore !== null)
                <x-rank-item :index="$userRank - 1" :user="$currentUser" :score="$currentUserScore" :highlight="true"
                    :isCurrentUser="true" />
            @endif
        </div>

    </div>
@endsection
