<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <header class="container">
        <nav>
            <a href="/">Jabar Trivia</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        Log in
                    </a>
                @endauth
            @endif
        </nav>
    </header>

    <main class="container">
        @session('success')
            <div id="success-alert">
                {{ session('success') }}
            </div>
        @endsession

        @session('error')
            <div id="error-alert">
                {{ session('error') }}
            </div>
        @endsession

        @yield('content')
    </main>

    <footer class="container">
        <span>Jabar Trivia &copy; {{ date('Y') }}</span>
    </footer>
</body>

</html>
