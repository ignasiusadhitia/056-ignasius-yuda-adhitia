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
                    <x-answered-question-item :answeredQuestion="$answeredQuestion" :currentPage="$answeredQuestions->currentPage()" :perPage="$answeredQuestions->perPage()" :index="$key" />
                @endforeach
            </div>
        @endif

        <div class="pagination-wrapper">
            {{ $answeredQuestions->links('vendor.pagination.index') }}
        </div>
    </section>

    <x-search-modal :showAnsweredCorrectlyFilter="true" :categories="$categories" actionUrl="{{ route('questions.answered') }}" />

@endsection
