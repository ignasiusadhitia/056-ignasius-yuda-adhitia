@extends('partials.layouts.app')

@section('title', 'My Question')

@section('content')

    <section class="section-wrapper">
        <h1>My Questions</h1>

        <div class="questions-wrapper">
            <div class="question-item">
                <div>1.</div>
                <div>Lorem ipsum dolor sit.</div>
                <div>Geography</div>
                <div>Easy</div>
                <div>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                </div>
            </div>

            <div class="question-item">
                <div>2.</div>
                <div>Lorem ipsum dolor sit.</div>
                <div>Geography</div>
                <div>Easy</div>
                <div>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                </div>
            </div>
            </tbody>
        </div>
    </section>

@endsection
