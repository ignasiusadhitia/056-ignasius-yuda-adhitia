@extends('partials.layouts.app')

@section('title', 'Jabar Trivia - Home')

@section('content')

    <h1>Jabar Trivia</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, sapiente laudantium. Similique quis illo pariatur
        ea laborum qui, maiores eius odio molestiae, esse ipsam blanditiis?</p>

    <a href="{{ route('register') }}">
        <button>Register</button>
    </a>

@endsection
