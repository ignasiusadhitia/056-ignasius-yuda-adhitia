@extends('partials.layouts.app')

@section('title', 'My Questions')

@section('content')

    <section class="section-wrapper">
        <div class="action-wrapper">
            <a href="{{ route('questions.create') }}" class="add-question-button">Add Question</a>
        </div>
        @if ($questions->isEmpty())
            <p>
                You haven't created any questions yet.
            </p>
        @else
            <div class="questions-wrapper">
                @foreach ($questions as $key => $question)
                    <div class="question-item">
                        <div>{{ $key + 1 }}</div>
                        <div>{{ Str::limit($question->question_text, 15) }}</div>
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
    </section>

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

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const questionId = this.getAttribute('data-question-id');
                const form = document.getElementById('deleteForm');
                form.action = `/questions/${questionId}`;
                document.getElementById('deleteModal').style.display = 'block';
            })
        })

        document.getElementById('cancelDeleteButton').addEventListener('click', function() {
            document.getElementById('deleteModal').style.display = 'none';
        });
    </script>
@endsection
