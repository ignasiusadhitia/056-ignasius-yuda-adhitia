@extends('partials.layouts.app')

@section('title', 'Trivia')

@section('content')
    <section class="section-wrapper">
        <h1>Trivia Play</h1>

        <div class="trivia-wrapper">

            <div id="statusModal" class="modal">
                <div class="modal-content">
                    <p id="statusMessage"></p>
                    <div>
                        <button id="nextQuestionBtn">Next Question</button>
                        <a href="{{ route('leaderboard') }}">Quit</a>
                    </div>
                </div>
            </div>


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

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

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
