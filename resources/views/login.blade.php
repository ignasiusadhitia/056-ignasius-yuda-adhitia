@extends('partials.layouts.app')

@section('title', 'Home')

@section('content')

    <section class="section-wrapper">
        <h1>Login</h1>

        <form action="" method="">
            @csrf

            <div>
                <input type="email" name="email" id="email" placeholder="Email">
                @error('email')
                    <div>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div>
                <input type="password" name="password" id="password" placeholder="Password">
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
