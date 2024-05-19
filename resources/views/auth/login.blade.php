@extends('partials.layouts.app')

@section('title', 'Login')

@section('content')

    <section class="section-wrapper">
        <h1>Login</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="field-wrapper">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                @error('email')
                    <div>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="field-wrapper">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                @error('password')
                    <div>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit">Login</button>
            </div>

            <div>
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </form>
    </section>

@endsection
