@extends('partials.layouts.app')

@section('title', 'Answered Questions')

@section('content')

    <section class="section-wrapper">
        <div class="action-wrapper">
            <a href="{{ route('questions.answered') }}" class="all-question-button">
                <span>
                    All
                </span>
            </a>
            <a href="{{ route('trivia.index') }}" class="play-trivia-button">
                <span>
                    Play
                </span>
            </a>
            <button id="openSearchModal" class="search-button">Search</button>
        </div>

        @if ($answeredQuestions->isEmpty())
            <div class="empty-message-wrapper">
                <p>No answered questions found.</p>
            </div>
        @else
            <div class="questions-wrapper">
                @foreach ($answeredQuestions as $key => $answeredQuestion)
                    <div class="question-item">
                        <div>
                            {{ ($answeredQuestions->currentPage() - 1) * $answeredQuestions->perPage() + $key + 1 }}
                        </div>
                        <div class="question-text-wrapper">
                            <p>
                                {{ $answeredQuestion->question->question_text }}
                            </p>
                        </div>
                        <div>
                            <span class="pill {{ Str::lower($answeredQuestion->question->category->name) }}">
                                {{ $answeredQuestion->question->category->name }}
                            </span>
                        </div>
                        <div>
                            <span class="pill {{ $answeredQuestion->question->difficulty_level }}">
                                {{ $answeredQuestion->question->difficulty_level }}
                            </span>
                        </div>
                        <div>
                            <span>{{ $answeredQuestion->answered_correctly ? 'Correct' : 'Incorrect' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="pagination-wrapper">
            {{ $answeredQuestions->links('vendor.pagination.index') }}
        </div>
    </section>

    <x-search-modal :showAnsweredCorrectlyFilter="true" :categories="$categories" actionUrl="{{ route('questions.answered') }}" />

@endsection
