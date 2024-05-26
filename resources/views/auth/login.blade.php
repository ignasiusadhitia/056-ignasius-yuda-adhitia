@extends('partials.layouts.app')

@section('title', 'Login')

@section('content')

    <section class="section-wrapper">

        <x-form action="{{ route('login') }}" method="POST" class="auth-form">
            <h1>Login</h1>

            <x-input id="email" name="email" type="email" label="Email:" />
            <x-error field="email" />

            <x-input id="password" name="password" type="password" label="Password:" />
            <x-error field="password" />

            <x-button>Login</x-button>

            <div>
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </x-form>
    </section>

@endsection
