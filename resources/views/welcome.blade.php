@extends('partials.layouts.app')

@section('title', 'Home')

@section('content')

    <section class="section-wrapper">
        <h1>Think You Know West Java? Unleash Your Inner Jabar Guru with Jabar Trivia!</h1>
        <p>Calling all West Java enthusiasts! Dive into the world of Jabar Trivia, the ultimate test of your Jabar
            knowledge.
            Answer captivating trivia questions with beautiful images, conquer the leaderboards, and emerge as a certified
            Jabar
            Guru! Create your own trivia challenges, rack up points, and battle your friends for trivia supremacy. It's time
            to
            unleash your inner Jabar expert and embark on a fun-filled learning adventure!</p>

        <a href="{{ route('register') }}">
            <button>Register</button>
        </a>
    </section>

@endsection
