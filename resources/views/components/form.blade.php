@props([
    'method' => 'post'
])

@php
$method = strtolower($method);
@endphp

<form method="{{ $method === 'get' ? 'get' : 'post' }}" {{ $attributes }}>
@if ($method != 'get')
    @csrf
@endif

@if (! in_array(strtolower($method), ['get', 'post']))
    @method($method)
@endif

{{ $slot }}

</form>