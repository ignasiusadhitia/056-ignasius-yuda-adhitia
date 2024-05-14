@extends('partials.layouts.app')

@section('title', 'Profile')

@section('content')

    <section class="section-wrapper">
        <h1>Profile</h1>

        <img id="avatar" src="{{ asset('assets/images/avatar-1.jpg') }}" alt="user-1">

        <form action="" method="" enctype="multipart/form-data">

            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ auth()->user() ? auth()->user()->name : '' }}">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"
                    value="{{ auth()->user() ? auth()->user()->email : '' }}" disabled>
            </div>

            <div>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                @error('image')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">Save Changes</button>
            </div>
        </form>
    </section>

@endsection
