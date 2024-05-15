@extends('partials.layouts.app')

@section('title', 'Trivia')

@section('content')

    <section class="section-wrapper">
        <h1>Trivia</h1>

        <div class="trivia-wrapper">
            <div class="question-wrapper">
                <img src="{{ asset('assets/images/question-image.jpg') }}" alt="question-image">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa consectetur nemo molestiae.</p>
            </div>
        </div>

        <div class="answers-wrapper">
            <div class="answer-item">Answer 1</div>
            <div class="answer-item">Answer 2</div>
            <div class="answer-item">Answer 3</div>
            <div class="answer-item">Answer 4</div>
        </div>
    </section>

@endsection
