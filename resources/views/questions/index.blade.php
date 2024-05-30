@extends('partials.layouts.app')

@section('title', 'My Questions')

@section('content')

    <section class="section-wrapper">
        <div class="action-wrapper">
            <a href="{{ route('questions.index') }}" class="all-question-button">
                <span>
                    All
                </span>
            </a>
            <a href="{{ route('questions.create') }}" class="add-question-button">
                <span>
                    Add
                </span>
            </a>
            <button id="openSearchModal" class="search-button">Search</button>
        </div>

        @if ($questions->isEmpty())
            <div class="empty-message-wrapper">
                <p>
                    @if (request()->has('search') || request()->has('category') || request()->has('difficulty'))
                        No questions found for your search criteria.
                    @else
                        You haven't created any questions yet.
                    @endif
                </p>
            </div>
        @else
            <div class="questions-wrapper">
                @foreach ($questions as $key => $question)
                    <div class="question-item">
                        <div>
                            {{ ($questions->currentPage() - 1) * $questions->perPage() + $key + 1 }}
                        </div>
                        <div class="question-text-wrapper">
                            <p>
                                {{ Str::limit($question->question_text, 15) }}
                            </p>
                        </div>
                        <div>
                            <span class="pill {{ Str::lower($question->category->name) }}">
                                {{ $question->category->name }}
                            </span>
                        </div>
                        <div>
                            <span class="pill {{ $question->difficulty_level }}">
                                {{ $question->difficulty_level }}
                            </span>
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
                @endforeach
            </div>
        @endif

        <div class="pagination-wrapper">
            {{ $questions->links('vendor.pagination.index') }}
        </div>


    </section>

    <x-search-modal :categories="$categories" actionUrl="{{ route('questions.index') }}" />

    <x-modal id="deleteModal" messageId='deleteMessage'>
        <div class="icon-wrapper">
            <i class="fas fa-trash"></i>
        </div>
        <h3>Delete Question</h3>
        <p>Are you sure you want to delete this question?</p>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <button type="button" id="cancelDeleteButton">Cancel</button>
            <button type="submit" id="confirmDeleteButton">Confirm</button>
        </form>
    </x-modal>

@endsection
