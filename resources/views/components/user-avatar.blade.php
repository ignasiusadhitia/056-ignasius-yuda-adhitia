@props(['user', 'id' => null])

@php
    $imagePath = $user->image ? asset('assets/images/' . $user->image) : asset('assets/images/avatar-1.jpg');
@endphp

<img src="{{ $imagePath }}" alt="{{ $user->name }}" id="{{ $id }}"
    {{ $attributes->merge(['class' => 'user-avatar']) }}>
