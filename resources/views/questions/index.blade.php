<<<<<<< HEAD
<h1>My Questions</h1>

@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@if ($questions->isEmpty())
    <div>
        You haven't created any questions yet.
    </div>
@else
    <table>
        <thead>
            <tr>
                <th>Question Text</th>
                <th>Category</th>
                <th>Difficulty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->question_text }}</td>
                    <td>{{ $question->category->name }}</td>
                    <td>{{ $question->difficulty_level }}</td>
                    <td>
                        <a href="{{ route('questions.edit', $question) }}">Edit</a>
                        <form action="{{ route('questions.destroy', $question) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Are you want to delete this question?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
=======
@extends('partials.layouts.app')

@section('title', 'My Question')

@section('content')

    <section class="section-wrapper">
        <h1>My Questions</h1>

        <div class="questions-wrapper">
            <div class="question-item">
                <div>1.</div>
                <div>Lorem ipsum dolor sit.</div>
                <div>Geography</div>
                <div>Easy</div>
                <div>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                </div>
            </div>

            <div class="question-item">
                <div>2.</div>
                <div>Lorem ipsum dolor sit.</div>
                <div>Geography</div>
                <div>Easy</div>
                <div>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                </div>
            </div>
            </tbody>
        </div>
    </section>

@endsection
>>>>>>> 86f418071df7aeb26dc3ee0dddde2e6864224544
