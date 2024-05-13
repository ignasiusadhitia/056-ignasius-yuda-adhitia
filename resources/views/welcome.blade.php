<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jabar Trivia</title>

    <!-- Fonts -->

    <!-- Styles -->

</head>

<body>
    <header>
        <span>Jabar Trivia</span>

        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main>
    </main>

    <footer>
        <span>Jabar Trivia &copy; {{ date('Y') }}</span>
    </footer>
</body>

</html>
