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
                        <div>{{ $key + 1 }}</div>
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

    <x-modal id="searchModal" messageId='searchQuestion'>
        <div class="icon-wrapper">
            <i class="fas fa-search"></i>
        </div>
        <h3>Search Question</h3>
        <p>Add specific criteria to narrow down your results</p>
        <form method="GET" action="{{ route('questions.answered') }}" class="filter-wrapper">
            <input type="text" name="search" id="searchField" placeholder="Search questions..."
                value="{{ request('search') }}">

            <select name="category" id="categoryFilter">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select name="difficulty" id="difficultyFilter">
                <option value="">All Difficulty Levels</option>
                <option value="easy" {{ request('difficulty') == 'easy' ? 'selected' : '' }}>Easy</option>
                <option value="medium" {{ request('difficulty') == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="hard" {{ request('difficulty') == 'hard' ? 'selected' : '' }}>Hard</option>
            </select>

            <select name="answered_correctly" id="answeredCorrectlyFilter">
                <option value="">All</option>
                <option value="1" {{ request('answered_correctly') == '1' ? 'selected' : '' }}>Correct</option>
                <option value="0" {{ request('answered_correctly') == '0' ? 'selected' : '' }}>Incorrect</option>
            </select>


            <button type="submit">Filter</button>
        </form>
    </x-modal>

    <script>
        const searchModal = document.getElementById('searchModal');
        const openSearchModal = document.getElementById('openSearchModal');

        openSearchModal.onclick = function() {
            searchModal.style.display = 'block';
        }

        window.onclick = function() {
            if (event.target == searchModal) {
                searchModal.style.display = 'none';
            }
        }
    </script>
@endsection
