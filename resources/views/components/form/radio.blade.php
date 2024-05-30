@props([
    'name'  => '',
    'id'    => '',
    'label' => '',
    'value' => ''
])

@if ($id === '')
    @php
        $id = $name;
    @endphp
@endif

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

<label aria-label="{{ $label }}" for='{{ $id }}' wire:key="{{ $id }}">
    <div class="flex gap-2">
        <input
            type="radio"
            name='{{ $name }}'
            id='{{ $id }}'
            value='{{ $value }}'
            @if ($slot != '') checked="checked" @endif
            class="rounded-md"
            {{ $attributes }}
        >
        {{ $label }}
    </div>
</label>
