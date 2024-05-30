@if ($shouldShow)
    <header class="container">
        <nav>
            @if (Auth::check())
                <div>
                    <a href="{{ in_array(Route::currentRouteName(), ['questions.create', 'questions.edit']) ? route('questions.index') : route('dashboard') }}"
                        class="back-button">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2>{{ $title }}</h2>
                </div>
            @else
                <a href="/" class="logo">
                    <span><span>Jabar</span> Trivia</span>
                </a>
                <a href="{{ route('login') }}" class="login-button">
                    <span>
                        Login
                    </span>
                </a>
            @endif
        </nav>
    </header>
@endif
