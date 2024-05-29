@props([
    'name'  => '',
    'id'    => '',
    'label' => '',
    'value' => '',
    'selected' => '',
    'class' => 'block cursor-pointer',
])

@php
if ($id === '') {
    $id = $name;
}
@endphp

@if ($label === '')
    @php
        //remove underscores from name
        $label = str_replace('_', ' ', $name);
        //detect subsequent letters starting with a capital
        $label = preg_split('/(?=[A-Z])/', $label);
        //display capital words with a space
        $label = implode(' ', $label);
        //uppercase first letter and lower the rest of a word
        $label = ucwords(strtolower($label));
    @endphp
@endif

<label for='{{ $id }}' wire:key="{{ $id }}" class="{{ $class }}">
    <div class="flex gap-2">
    <input
        type="checkbox"
        name='{{ $name }}'
        id='{{ $id }}'
        value='{{ $value }}'
        @if ($selected === $value) checked='checked' @endif {{ $attributes }}
    >
        {{ $label }}
    </div>
</label>
