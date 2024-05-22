@props(['action', 'method' => 'POST'])

<form action="{{ $action }}" method="{{ strtoupper($method) == 'GET' ? 'GET' : 'POST' }}">
    @csrf
    @if (!in_array(strtoupper($method), ['POST', 'GET']))
        @method($method)
    @endif
    {{ $slot }}
</form>
