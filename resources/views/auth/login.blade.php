@extends('layouts.app')

@section('title', 'Login Page')

@section('content')

    <form action="{{ route('login') }}" method="POST">
        <h2>Login</h2>

        @csrf
        <div>
            <input type="email" id="email" placeholder="Email">
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
            <button type="submit">Login</button>
        </div>

        <div>
            <p>Don't have an account? <a href="">Register</a></p>
        </div>
    </form>
