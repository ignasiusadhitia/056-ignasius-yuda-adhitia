@extends('partials.layouts.app')

@section('title', 'Home')

@section('content')

    <section class="section-wrapper">
        <h1>Register</h1>

        <form action="" method="">
            @csrf

            <div>
                <input type="text" name="name" id="name" placeholder="Name">
                @error('name')
                    <div>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

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
                <button type="submit">Register</button>
            </div>

            <div>
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </section>

@endsection
