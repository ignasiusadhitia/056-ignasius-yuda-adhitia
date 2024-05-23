@extends('partials.layouts.app')

@section('title', 'Profile')

@section('content')

    <section class="section-wrapper">

        <x-user-avatar :user="auth()->user()" id="avatar" />

        <x-form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
            <x-input id="name" name="name" type="text" label="Name:" :value="auth()->user()->name" />
            <x-error field="name" />

            <x-input id="email" name="email" type="email" label="Email:" :value="auth()->user()->email" disabled="true" />

            <x-input id="image" name="image" type="file" label="Image:" />
            <x-error field="image" />

            <x-button>Save Changes</x-button>
        </x-form>
    </section>

@endsection
