@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Leaderboard</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>User</th>
                    <th>Total Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $index => $score)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $score->user->name }}</td>
                        <td>{{ $score->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
