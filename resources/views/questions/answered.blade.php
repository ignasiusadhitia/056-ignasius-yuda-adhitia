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

            <x-select id="categoryFilter" name="category" label="" :options="$categories
                ->prepend(['id' => '', 'name' => 'All Categories'])
                ->map(
                    fn($category) => [
                        'value' => $category['id'],
                        'label' => $category['name'],
                        'selected' => request('category') == $category['id'],
                    ],
                )
                ->toArray()" :selected="request('category')" />

            <x-select id="difficultyFilter" name="difficulty" label="" :options="[
                ['value' => '', 'label' => 'All Difficulty Levels', 'selected' => request('difficulty') == ''],
                ['value' => 'easy', 'label' => 'Easy', 'selected' => request('difficulty') == 'easy'],
                ['value' => 'medium', 'label' => 'Medium', 'selected' => request('difficulty') == 'medium'],
                ['value' => 'hard', 'label' => 'Hard', 'selected' => request('difficulty') == 'hard'],
            ]" :selected="request('difficulty')" />

            <x-select id="answeredCorrectlyFilter" name="answered_correctly" label="" :options="[
                ['value' => '', 'label' => 'All Answers', 'selected' => request('answered_correctly') == ''],
                ['value' => '1', 'label' => 'Correct Answers', 'selected' => request('answered_correctly') == '1'],
                ['value' => '0', 'label' => 'Incorrect Answers', 'selected' => request('answered_correctly') == '0'],
            ]"
                :selected="request('answered_correctly')" />

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
