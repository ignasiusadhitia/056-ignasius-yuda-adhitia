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
                            <form action="{{ route('questions.destroy', $question) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Are you want to delete this question?')">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

    @endif
@endsection
