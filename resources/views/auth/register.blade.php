@extends('partials.layouts.app')

@section('title', 'Register')

@section('content')

    <section class="section-wrapper">

        <h1>Register</h1>

        <x-form action="{{ route('register') }}" method="POST">
            <x-input id="name" name="name" type="text" label="Name:" />
            <x-error field="name" />

            <x-input id="email" name="email" type="email" label="Email:" />
            <x-error field="email" />

            <x-input id="password" name="password" type="password" label="Password:" />
            <x-error field="password" />

            <x-button>Register</x-button>

            <div>
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </x-form>

    </section>

@endsection
