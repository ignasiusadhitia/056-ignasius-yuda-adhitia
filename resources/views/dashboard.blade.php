@extends('layouts.layout')

@section('title', 'Dashboard Page')

@section('content')

    <h2>Hi {{ auth()->user()->name }}, Welcome to Jabar Trivia</h2>

@endsection
