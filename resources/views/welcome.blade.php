@extends('partials.layouts.app')

@section('title', 'Home')

@section('content')

    <section class="section-wrapper">
        <div class="hero">
            <h1>Dive into <span>West Java</span> like never before!</h1>
            <p>Jabar Trivia is the ultimate quiz app to test your knowledge on history, geography, culture, and more!
            </p>

            <a href="{{ route('register') }}" class="register-button-wrapper">
                <button>Register and Begin Exploring</button>
            </a>
        </div>
    </section>

@endsection
