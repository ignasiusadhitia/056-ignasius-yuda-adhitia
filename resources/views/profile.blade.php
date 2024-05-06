@extends('layouts.layout')

@section('title', 'Profile Page')

@section('content')

    <h2>Profile</h2>
    <form action="{{ route('profile') }}" method="POST">

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
            <input type="email" id="email" name="email" value="{{ auth()->user() ? auth()->user()->email : '' }}"
                disabled>
        </div>

        <div>
            <button type="submit">Save Changes</button>
        </div>
    </form>
@endsection
