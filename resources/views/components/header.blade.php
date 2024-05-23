@if ($shouldShow)
    <header class="container">
        <nav>
            @if (Auth::check())
                <div>
                    <a
                        href="{{ in_array(Route::currentRouteName(), ['questions.create', 'questions.edit']) ? route('questions.index') : route('dashboard') }}">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h1>{{ $title }}</h1>
                </div>
            @else
                <a href="/">Jabar Trivia</a>
                <a href="{{ route('login') }}">Login</a>
            @endif
        </nav>
    </header>
@endif
