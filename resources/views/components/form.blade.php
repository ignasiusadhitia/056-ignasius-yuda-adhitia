@props(['action', 'method' => 'POST', 'enctype' => null, 'class' => ''])

<form action="{{ $action }}" method="{{ strtoupper($method) == 'GET' ? 'GET' : 'POST' }}"
    {{ $enctype ? 'enctype=' . $enctype : '' }} class="{{ $class }}">
    @csrf
    @if (!in_array(strtoupper($method), ['POST', 'GET']))
        @method($method)
    @endif
    {{ $slot }}
</form>
