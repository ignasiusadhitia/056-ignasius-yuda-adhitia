@extends('layouts.app')

@section('content')
    <h1>Jabar Trivia</h1>

    @if (@session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    @if ($question)
        <h2>{{ $question->question_text }}</h2>
        @if ($question->image_url)
            <img src="{{ $question->image_url }}" alt="Question Image">
        @endif

        <form action="
        {{ route('trivia.play') }}
        " method="POST">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <div>
                @foreach ($question->answers as $answer)
                    <div>
                        <input type="radio" name="answer_id" id="answer-{{ $answer->id }}" value="{{ $answer->id }}">
                        <label for="answer-{{ $answer->id }}">{{ $answer->answer_text }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit">Submit Answer</button>
        </form>
    @else
        <p>You have finished the trivia game!</p>
        <a href="{{ route('leaderboard') }}">See Leaderboard</a>
    @endif

    @if (isset($nextQuestion))
        <h2>Next Question</h2>
        @include('partials.question', ['question' => $nextQuestion])
    @endif

    <div>
        @if ($question)
            <button type="button" id="next-button">Next</button>
            <a href="{{ route('leaderboard') }}">Quit</a>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('next-button').addEventListener('click', function() {
            document.querySelector('form').submit();
        })
    </script>
@endsection
