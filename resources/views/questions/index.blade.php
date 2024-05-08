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
