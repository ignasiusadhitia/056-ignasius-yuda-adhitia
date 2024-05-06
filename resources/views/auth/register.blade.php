@extends('layouts.app')

@section('title', 'Register Page')

@section('content')

    <form action="" method="POST">
        <h2>Register</h2>

        @csrf
        <div>
            <input type="text" name="name" id="name" placeholder="Name">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="email" name="email" id="email" placeholder="Email">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="password" name="password" id="password" placeholder="Password">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Register</button>
        </div>

        <div>
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </form>

@endsection
