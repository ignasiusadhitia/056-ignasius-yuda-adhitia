@if ($shouldShow)
    <header class="container">
        <nav>
            @if (Auth::check())
                <h1>{{ $title }}</h1>
                <a
                    href="{{ in_array(Route::currentRouteName(), ['questions.create', 'questions.edit']) ? route('questions.index') : route('dashboard') }}">Back</a>
            @else
                <a href="/">Jabar Trivia</a>
                <a href="{{ route('login') }}">Login</a>
            @endif
        </nav>
    </header>
@endif
