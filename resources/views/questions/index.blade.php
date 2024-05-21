@extends('partials.layouts.app')

@section('title', 'My Question')

@section('content')

    <section class="section-wrapper">
        <h1>My Questions</h1>
        @if ($questions->isEmpty())
            <p>
                You haven't created any questions yet.
            </p>
        @else
            <div class="questions-wrapper">
                @foreach ($questions as $key => $question)
                    <div class="question-item">
                        <div>{{ $key + 1 }}</div>
                        <div>{{ $question->question_text }}</div>
                        <div>{{ $question->category->name }}</div>
                        <div>{{ $question->difficulty_level }}</div>
                        <div>
                            <a href="{{ route('questions.edit', $question) }}">Edit</a>
                            <button type="button" class="btn-delete" data-question-id="{{ $question->id }}">Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <x-modal id="deleteModal" messageId='deleteMessage'>
        <p>Are you sure you want to delete this question?</p>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">Confirm</button>
            <button type="button" id="cancelDeleteBtn">Cancel</button>
        </form>
    </x-modal>

    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const questionId = this.getAttribute('data-question-id');
                const form = document.getElementById('deleteForm');
                form.action = `/questions/${questionId}`;
                document.getElementById('deleteModal').style.display = 'block';
            })
        })

        document.getElementById('cancelDeleteBtn').addEventListener('click', function() {
            document.getElementById('deleteModal').style.display = 'none';
        });
    </script>
@endsection
