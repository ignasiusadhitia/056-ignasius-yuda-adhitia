@props(['type' => 'submit', 'icon' => null, 'text' => null])

<button type="{{ $type }}">
    @if ($icon)
        <i class="{{ $icon }}"></i>
    @endif
    @if ($text)
        <span>{{ $text }}</span>
    @elseif ($slot->isNotEmpty())
        {{ $slot }}
    @endif
</button>
