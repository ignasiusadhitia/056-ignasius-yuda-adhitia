@extends('partials.layouts.app')

@section('title', 'Trivia')

@section('content')
    <section class="section-wrapper">
        <div class="trivia-wrapper">

            <x-modal id="statusModal" messageId="statusMessage">
                <button id="nextQuestionBtn">Next Question</button>
                <a href="{{ route('leaderboard') }}">Quit</a>
            </x-modal>



            <div class="question-wrapper">
                @if ($question->image_url)
                    <img src="{{ $question->image_url }}" alt="question-image">
                @endif
                <div>
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

                fetch('{{ route('trivia.answer') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            question_id: '{{ $question->id }}',
                            answer_id: this.getAttribute('data-answer-id')
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('statusMessage').textContent = data.status;
                        document.getElementById('statusModal').style.display = 'block';
                    })
                    .catch(error => console.error('Error:', error));
            })
        })

        document.getElementById('nextQuestionBtn').addEventListener('click', function() {
            window.location.href = '{{ route('trivia.index') }}';
        })
    </script>
@endsection
