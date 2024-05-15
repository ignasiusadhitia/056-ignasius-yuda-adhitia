<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jabar Trivia</title>
</head>

<body>
    <h1>Jabar Trivia</h1>
    <ul id="questions">
        @foreach ($questions as $question)
            {{-- {{ dd($question) }} --}}
            <li>
                <h3>{{ $question->question_text }}</h3>
                <form action="#" id="answer-form-{{ $question->id }}">
                    @foreach ($question->answers as $answer)
                        {{-- {{ dd($answer) }} --}}
                        <input type="radio" name="answer" id="answer-{{ $answer->id }}"
                            value="{{ $answer->answer_text }}">
                        <label for="answer-{{ $answer->id }}">{{ $answer->answer_text }}</label><br>
                    @endforeach
                    <button type="submit">Submit Answer</button>
                </form>
            </li>
        @endforeach
    </ul>

    <div id="modal" class="modal">
        <div class="modal-content">
            <p id="feedback"></p>
            <button id="next-question">Next Question</button>
            <a href="{{ route('leaderboard') }}">Leaderboard</a>
        </div>
    </div>

    <script>
        const answerForms = document.querySelectorAll('form[id^="answer-form-"]');
        const modal = document.getElementById('modal');
        const feedbackElement = document.getElementById('feedback');
        const nextQuestionButton = document.getElementById('next-question');

        answerForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const questionId = this.id.split('-')
                const questionId = this.id.split('-')[2];
                const answer = document.querySelector('input[name="answer"]:checked').value;

                fetch(`/quiz/answer?question_id=${questionId}&answer=${answer}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.correct) {
                            feedbackElement.textContent = 'Correct!';
                        } else {
                            feedbackElement.textContent = 'Incorrect.';
                        }
                        modal.classList.add('show');
                    });
            });

            nextQuestionButton.addEventListener('click', function() {
                // Logic to fetch and display the next question (replace with your implementation)
                // You can remove the current question from the DOM or reload the entire quiz view.
            });
        });
    </script>

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
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .modal.show {
            display: block;
        }
    </style>
</body>

</html>
