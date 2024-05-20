@extends('partials.layouts.app')

@section('title', 'Trivia')

@section('content')
    <section class="section-wrapper">
        <h1>Trivia Play</h1>

        <div class="trivia-wrapper">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="trivia-wrapper">
                <div class="question-wrapper">
                    @if ($question->image_url)
                        <img src="{{ $question->image_url }}" alt="question-image">
                    @endif
                    <p>{{ $question->question_text }}</p>
                </div>
            </div>
            <form id="triviaForm" action="{{ route('trivia.answer') }}" method="POST" class="answers-wrapper">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <input type="hidden" id="answer_id" name="answer_id" value="">

                @foreach ($question->answers as $answer)
                    <div class="answer-item">
                        <button type="button" class="btn-answer"
                            data-answer-id="{{ $answer->id }}">{{ $answer->answer_text }}</button>
                    </div>
                @endforeach
            </form>
        </div>
    </section>

    <script>
        document.querySelectorAll('.btn-answer').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('answer_id').value = this.getAttribute('data-answer-id');
                document.getElementById('triviaForm').submit()
            })
        })
    </script>
@endsection
