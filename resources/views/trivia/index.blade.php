@extends('partials.layouts.app')

@section('title', 'Trivia')

@section('content')
    <section class="section-wrapper">
        <div class="trivia-wrapper">

            <x-modal id="statusModal" messageId="statusMessage">
                <div class="action-wrapper">
                    <a href="{{ route('leaderboard') }}">
                        <span>Quit</span>
                    </a>
                    <button id="nextQuestionButton">Play</button>
                </div>
            </x-modal>

            <x-modal id="timeoutModal" messageId="timeoutMessage">
                <div class="icon-wrapper">
                    <i class="fa-solid fa-hourglass-end"></i>
                </div>
                <h3>Time Is Up!</h3>
                <p>What would you like to do?</p>
                <div class="action-wrapper">
                    <a href="{{ route('leaderboard') }}">
                        <span>Quit</span>
                    </a>
                    <button id="continueButton">Play</button>
                </div>
            </x-modal>


            <div class="question-wrapper">
                @if ($question->image_url)
                    <img src="{{ $question->image_url }}" alt="question-image">
                @endif
                <div>
                    <p>{{ $question->question_text }}</p>
                </div>
            </div>

            <div class="timer">
                <p>Time remaining: <span id="countdown">5</span> seconds</p>
            </div>

            <form id="triviaForm" action="{{ route('trivia.answer') }}" method="POST" class="answers-wrapper">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <input type="hidden" id="answer_id" name="answer_id" value="">

                <div>
                    @foreach ($question->answers as $answer)
                        <div class="answer-item">
                            <button type="button" class="btn-answer"
                                data-answer-id="{{ $answer->id }}">{{ $answer->answer_text }}</button>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let timer;
            let countdownElement = document.getElementById('countdown');
            let timeLeft = 5;
            let userAnswered = false;

            function startTimer() {
                countdownElement.textContent = timeLeft;

                timer = setInterval(function() {
                    timeLeft--;
                    countdownElement.textContent = timeLeft;

                    if (timeLeft <= 0) {
                        clearInterval(timer);
                        showTimeoutModal();
                    }
                }, 1000);
            }

            function showTimeoutModal() {
                const timeoutModal = document.getElementById('timeoutModal');
                timeoutModal.style.display = 'block';
            }

            document.querySelectorAll('.btn-answer').forEach(button => {
                button.addEventListener('click', function() {
                    clearInterval(timer);
                    userAnswered = true;
                    document.getElementById('answer_id').value = this.getAttribute(
                        'data-answer-id');

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
                            const statusMessage = document.getElementById('statusMessage');
                            const statusSymbol = document.getElementById('statusSymbol');
                            const statusModal = document.getElementById('statusModal');

                            statusMessage.textContent = data.status;

                            statusSymbol.classList.remove('animate__animated',
                                'animate__bounceIn');
                            statusSymbol.innerHTML = data.isCorrect ?
                                '<i class="fas fa-check-circle"></i>' :
                                '<i class="fas fa-times-circle"></i>';
                            statusSymbol.classList.add('animate__animated',
                                'animate__bounceIn');

                            statusModal.style.display = 'block';
                        })
                        .catch(error => console.error('Error:', error));
                })
            })

            document.getElementById('nextQuestionButton').addEventListener('click', function() {
                window.location.href = '{{ route('trivia.index') }}';
            })

            document.getElementById('continueButton').addEventListener('click', function() {
                window.location.href = '{{ route('trivia.index') }}';
            })

            startTimer();
        });
    </script>
@endsection
