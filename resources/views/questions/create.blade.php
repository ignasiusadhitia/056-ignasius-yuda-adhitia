@extends('partials.layouts.app')

@section('title', 'Add Question')

@section('content')
    <section class="section-wrapper">
        <x-question-form :action="route('questions.store')" method="POST" :categories="$categories" />
    </section>
@endsection
