@extends('layouts.layout')

@section('title', 'Dashboard Page')

@section('content')

    <h2>Hi {{ auth()->user()->name }}, Welcome to Jabar Trivia</h2>

    @if (auth()->user()->image)
        <img src="{{ asset('images/' . auth()->user()->image) }}" alt="profile" />
    @endif

    <a href="{{ route('trivia.play') }}">Play</a>

@endsection
