@props(['index', 'user', 'score', 'highlight', 'isCurrentUser'])
<div class="rank-item {{ $highlight ? 'highlight' : '' }}">
    <div>{{ $index + 1 }}.</div>
    <x-user-avatar :user="$user" />
    <div>{{ $isCurrentUser ? 'You' : $user->name }}</div>
    <div>{{ $score }} pts</div>
</div>
