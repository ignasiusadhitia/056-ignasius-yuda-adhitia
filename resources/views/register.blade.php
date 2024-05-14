@extends('partials.layouts.app')

@section('title', 'Home')

@section('content')

    <section class="section-wrapper">
        <h1>Register</h1>

        <form action="" method="">
            @csrf

            <div class="field-wrapper">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
                @error('name')
                    <div>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

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
                <button type="submit">Register</button>
            </div>

            <div>
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </section>

@endsection
