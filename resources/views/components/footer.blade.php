<footer class="container">
    @if ($showBottomNavigation)
        <x-bottom-navigation />
    @elseif ($showCopyright)
        <p>&copy; {{ date('Y') }} Jabar Trivia. All rights reserved.</p>
    @endif
</footer>
