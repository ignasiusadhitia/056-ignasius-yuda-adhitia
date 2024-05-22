@extends('partials.layouts.app')

@section('title', 'Edit Question')

@section('content')
    <section class="section-wrapper">
        <x-question-form :action="route('questions.update', $question->id)" method="PUT" :question="$question" :categories="$categories" />
    </section>
@endsection
