@extends('partials.layouts.app')

@section('title', 'Leaderboard')

@section('content')
    <div class="section-wrapper">
        <h1>Leaderboard</h1>

        <div class="rank-wrapper">
            @foreach ($scores as $index => $score)
                <div class="rank-item">
                    <div>{{ $index + 1 }}.</div>
                    <img src="{{ asset('assets/images/' . $score->user->image) }}" alt="user-1">
                    <div>{{ $score->user->name }}</div>
                    <div>{{ $score->score }}pts</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
