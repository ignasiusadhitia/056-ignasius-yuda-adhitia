@extends('partials.layouts.app')

@section('title', 'Edit Question')

@section('content')

    <section class="section-wrapper">
        <h1>Edit Question</h1>

        <form method="POST" action="{{ route('questions.update', $question->id) }}">
            @csrf
            @method('PUT')

            <div class="field-wrapper">
                <label for="question_text">Question Text:</label>
                <input type="text" id="question_text" name="question_text"
                    value="{{ old('question_text', $question->question_text) }}" required>
            </div>

            <div class="field-wrapper">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field-wrapper">
                <label for="difficulty_level">Difficulty Level:</label>
                <select name="difficulty_level" id="difficulty_level" required>
                    <option value="easy" {{ $question->difficulty_level == 'easy' ? 'selected' : '' }}>Easy</option>
                    <option value="medium" {{ $question->difficulty_level == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="hard" {{ $question->difficulty_level == 'hard' ? 'selected' : '' }}>Hard</option>
                </select>
            </div>

            <div class="field-wrapper">
                <label for="image_url">Image URL:(optional)</label>
                <input type="text" id="image_url" name="image_url" value="{{ old('image_url', $question->image_url) }}">
            </div>

            <h4>Answers:</h4>

            <div class="field-wrapper">
                <label for="answer1">Answer 1:</label>
                <input type="text" id="answer1" name="answer[]"
                    value="{{ old('answer.0', $question->answers[0]->answer_text) }}" required>
            </div>

            <div class="field-wrapper">
                <label for="answer2">Answer 2:</label>
                <input type="text" id="answer2" name="answer[]"
                    value="{{ old('answer.1', $question->answers[1]->answer_text) }}" required>
            </div>

            <div class="field-wrapper">
                <label for="answer3">Answer 3:</label>
                <input type="text" id="answer3" name="answer[]"
                    value="{{ old('answer.2', $question->answers[2]->answer_text) }}" required>
            </div>

            <div class="field-wrapper">
                <label for="answer4">Answer 4:</label>
                <input type="text" id="answer4" name="answer[]"
                    value="{{ old('answer.3', $question->answers[3]->answer_text) }}" required>
            </div>

            <div class="field-wrapper">
                <label for="correct_answer">Correct Answer:</label>
                <select name="correct_answer" id="correct_answer" required>
                    <option value="1" {{ $question->correct_answer == 1 ? 'selected' : '' }}>Answer 1</option>
                    <option value="2" {{ $question->correct_answer == 2 ? 'selected' : '' }}>Answer 2</option>
                    <option value="3" {{ $question->correct_answer == 3 ? 'selected' : '' }}>Answer 3</option>
                    <option value="4" {{ $question->correct_answer == 4 ? 'selected' : '' }}>Answer 4</option>
                </select>
            </div>

            <button type="submit">Update Question</button>
        </form>
    </section>

@endsection
