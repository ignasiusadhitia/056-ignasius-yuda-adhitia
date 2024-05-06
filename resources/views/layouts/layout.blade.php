<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>

<body>

</body>

<header>
    <nav>
        <div>
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('profile') }}">Profile</a>
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div>
    <div>
        @session('success')
            <div>
                {{ session('success') }}
            </div>
        @endsession

        @yield('content')
    </div>
</div>

</html>
