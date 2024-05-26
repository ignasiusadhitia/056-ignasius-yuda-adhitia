@props(['action', 'method' => 'POST', 'question' => null, 'categories' => []])

<x-form :action="$action" :method="$method">
    <x-input type="text" id="question_text" name="question_text" label="Question Text:" :value="old('question_text', $question->question_text ?? '')" />
    <x-error field="question_text" />

    <x-select id="category_id" name="category_id" label="Category:" :options="$categories
        ->map(function ($category) use ($question) {
            return [
                'value' => $category->id,
                'label' => $category->name,
                'selected' => $question && $question->category_id == $category->id,
            ];
        })
        ->toArray()" />
    <x-error field="category_id" />

    <x-select id="difficulty_level" name="difficulty_level" label="Difficulty Level:" :options="[
        ['value' => 'easy', 'label' => 'Easy', 'selected' => $question && $question->difficulty_level == 'easy'],
        [
            'value' => 'medium',
            'label' => 'Medium',
            'selected' => $question && $question->difficulty_level == 'medium',
        ],
        ['value' => 'hard', 'label' => 'Hard', 'selected' => $question && $question->difficulty_level == 'hard'],
    ]" />
    <x-error field="difficulty_level" />

    <x-input type="text" id="image_url" name="image_url" label="Image URL (optional)" :value="old('image_url', $question->image_url ?? '')" />
    <x-error field="image_url" />

    <h4>Answers:</h4>
    @for ($i = 1; $i <= 4; $i++)
        <x-input type="text" id="answer{{ $i }}" name="answer[]" label="Answer {{ $i }}:"
            :value="old('answer.' . ($i - 1), $question->answers[$i - 1]->answer_text ?? '')" />
        <x-error field="answer.{{ $i - 1 }}" />
    @endfor

    <x-select id="correct_answer" name="correct_answer" label="Correct Answer:" :options="[
        [
            'value' => 1,
            'label' => 'Answer 1',
            'selected' => old('correct_answer', $question->answers[0]->is_correct ?? false) == 1,
        ],
        [
            'value' => 2,
            'label' => 'Answer 2',
            'selected' => old('correct_answer', $question->answers[1]->is_correct ?? false) == 2,
        ],
        [
            'value' => 3,
            'label' => 'Answer 3',
            'selected' => old('correct_answer', $question->answers[2]->is_correct ?? false) == 3,
        ],
        [
            'value' => 4,
            'label' => 'Answer 4',
            'selected' => old('correct_answer', $question->answers[3]->is_correct ?? false) == 4,
        ],
    ]" />
    <x-error field="correct_answer" />

    <x-button>
        @if ($method == 'POST')
            Create Question
        @else
            Update Question
        @endif
    </x-button>
</x-form>
