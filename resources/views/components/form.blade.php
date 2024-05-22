@props(['action', 'method' => 'POST', 'enctype' => null])

<form action="{{ $action }}" method="{{ strtoupper($method) == 'GET' ? 'GET' : 'POST' }}"
    {{ $enctype ? 'enctype=' . $enctype : '' }}>
    @csrf
    @if (!in_array(strtoupper($method), ['POST', 'GET']))
        @method($method)
    @endif
    {{ $slot }}
</form>
