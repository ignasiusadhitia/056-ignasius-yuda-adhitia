@extends('partials.layouts.app')

@section('title', 'Edit Question')

@section('content')

    <section class="section-wrapper">
        <h1>Edit Question</h1>

        <form action="" method="">
            @csrf
            @method()

            <div class="field-wrapper">
                <label for="question_text">Question Text:</label>
                <input type="text" id="question_text" name="question_text" value="{{ old('question_text') }}" required>
            </div>

            <div class="field-wrapper">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id">
                    {{-- @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach --}}
                    <option value="1">Geography</option>
                    <option value="2">History</option>
                    <option value="3">Culture</option>
                    <option value="4">Flora & Fauna</option>
                    <option value="5">Tourism</option>
                    <option value="6">Language</option>
                    <option value="7">Figure</option>
                </select>
            </div>

            <div class="field-wrapper">
                <label for="difficulty_level">Difficulty Level:</label>
                <select name="difficulty_level" id="difficulty_level" required>
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
            </div>

            <div class="field-wrapper">
                <label for="image_url">Image (optional)</label>
                <input type="file" id="image_url" name="image_url" value="{{ old('image_url') }}">
            </div>

            <h4>Answers:</h4>

            <div class="field-wrapper">
                <label for="answer1">Answer 1:</label>
                <input type="text" id="answer1" name="answer[]" required>
            </div>

            <div class="field-wrapper">
                <label for="answer2">Answer 2:</label>
                <input type="text" id="answer2" name="answer[]" required>
            </div>

            <div class="field-wrapper">
                <label for="answer3">Answer 3:</label>
                <input type="text" id="answer3" name="answer[]" required>
            </div>

            <div class="field-wrapper">
                <label for="answer4">Answer 4:</label>
                <input type="text" id="answer4" name="answer[]" required>
            </div>

            <div class="field-wrapper">
                <label for="correct_answer">Correct Answer:</label>
                <select name="correct_answer" id="correct_answer" required>
                    <option value="1">Answer 1</option>
                    <option value="2">Answer 2</option>
                    <option value="3">Answer 3</option>
                    <option value="4">Answer 4</option>
                </select>
            </div>

            <button type="submit">Update Question</button>
        </form>
    </section>

@endsection
