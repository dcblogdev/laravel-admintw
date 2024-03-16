@props([
    'name'
])
<div x-show="tab === '{{ $name }}'" class="py-5">
    {{ $slot }}
</div>