@props([
    'method' => 'post',
    'action' => ''
])

@php
$method = strtolower($method);
@endphp

<form method="{{ $method === 'get' ? 'get' : 'post' }}" action="{{ $action }}" {{ $attributes}}>
@if ($method != 'get')
    @csrf
@endif

@if (! in_array(strtolower($method), ['get', 'post']))
    @method($method)
@endif

{{ $slot }}

</form>