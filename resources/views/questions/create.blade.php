@extends('partials.layouts.app')

@section('title', 'Create Question')

@section('content')
    <section class="section-wrapper">
        <h1>Create Question</h1>
        <x-question-form :action="route('questions.store')" method="POST" :categories="$categories" />
    </section>
@endsection
