@props([
    'name'
])
<div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : '{{ $name }}' }">
    {{ $slot }}
</div>