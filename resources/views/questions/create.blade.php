<h1>Create New Question</h1>

@if (@errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="question_text">Question Text:</label>
        <input type="text" id="question_text" name="question_text" value="{{ old('question_text') }}" required>
    </div>

    <div>
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="difficulty_level">Difficulty Level:</label>
        <select name="difficulty_level" id="difficulty_level" required>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
    </div>

    <div>
        <label for="image_url">Image URL:</label>
        <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}">
        <input type="file" id="image" name="image">
    </div>

    <h4>Answers:</h4>

    <div>
        <label for="answer1">Answer 1:</label>
        <input type="text" id="answer1" name="answer[]" required>
    </div>

    <div>
        <label for="answer2">Answer 2:</label>
        <input type="text" id="answer2" name="answer[]" required>
    </div>

    <div>
        <label for="answer3">Answer 3:</label>
        <input type="text" id="answer3" name="answer[]" required>
    </div>

    <div>
        <label for="answer4">Answer 4:</label>
        <input type="text" id="answer4" name="answer[]" required>
    </div>

    <div>
        <label for="correct_answer">Correct Answer:</label>
        <select name="correct_answer" id="correct_answer" required>
            <option value="1">Answer 1</option>
            <option value="2">Answer 2</option>
            <option value="3">Answer 3</option>
            <option value="4">Answer 4</option>
        </select>
    </div>

    <button type="submit">Create Question</button>
</form>
