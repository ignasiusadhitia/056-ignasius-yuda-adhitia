<header class="container">
    <nav>
        @if (Route::has('login'))
            <x-navigation-link href="/" text="Jabar Trivia" />
        @endif

        @auth
            <x-navigation-link href="{{ url('/dashboard') }}" text="Dashboard"
                active="{{ request()->routeIs('dashboard') }}" />
        @else
            <x-navigation-link href="{{ route('login') }}" text="Log in" />
        @endauth
    </nav>
</header>
