@extends('layouts.app')

@section('content')
    <h1>Trivia Play</h1>

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <h2>{{ $question->question_text }}</h2>
        <form action="{{ route('trivia.answer') }}" method="POST">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            @foreach ($question->answers as $answer)
                <div>
                    <input type="radio" name="answer_id" value="{{ $answer->id }}" required>
                    <label>{{ $answer->answer_text }}</label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit Answer</button>
        </form>
    </div>
@endsection
