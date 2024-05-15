@extends('partials.layouts.app')

@section('title', 'Leaderboard')

@section('content')

    <section class="section-wrapper">
        <h1>Leaderboard</h1>

        <div class="rank-wrapper">
            <div class="rank-item">
                <div>1.</div>
                <img src="{{ asset('assets/images/avatar-1.jpg') }}" alt="user-1">
                <div>User 1</div>
                <div>100pts</div>
            </div>

            <div class="rank-item">
                <div>2.</div>
                <img src="{{ asset('assets/images/avatar-2.jpg') }}" alt="user-2">
                <div>User 2</div>
                <div>50pts</div>
            </div>
            </tbody>
        </div>
    </section>

@endsection
