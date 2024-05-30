<div class="question-item">
    <div>
        {{ ($currentPage - 1) * $perPage + $index + 1 }}
    </div>
    <div class="question-text-wrapper">
        <p>{{ Str::limit($question->question_text, 15) }}</p>
    </div>
    <div>
        <x-pill :text="$question->category->name" :class="Str::lower($question->category->name)" />
    </div>
    <div>
        <x-pill :text="$question->difficulty_level" :class="$question->difficulty_level" />
    </div>
    <div class="action-wrapper">
        <a href="{{ route('questions.edit', $question) }}" class="edit-button">
            <i class="fas fa-edit"></i>
        </a>
        <a type="button" class="delete-button" data-question-id="{{ $question->id }}">
            <i class="fas fa-trash"></i>
        </a>
    </div>
</div>
