<div class="question-item">
    <div>
        {{ ($currentPage - 1) * $perPage + $index + 1 }}
    </div>
    <div class="question-text-wrapper">
        <p>
            {{ $answeredQuestion->question->question_text }}
        </p>
    </div>
    <div>
        <x-pill :text="$answeredQuestion->question->category->name" :class="Str::lower($answeredQuestion->question->category->name)" />
    </div>
    <div>
        <x-pill :text="$answeredQuestion->question->difficulty_level" :class="$answeredQuestion->question->difficulty_level" />
    </div>
    <div>
        <span>{{ $answeredQuestion->answered_correctly ? 'Correct' : 'Incorrect' }}</span>
    </div>
</div>
