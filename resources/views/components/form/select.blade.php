@props([
    'required' => '',
    'name' => '',
    'id' => '',
    'placeholder' => '',
    'label' => ''
])

@if ($label === 'none')

@elseif ($label === '')
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

<div class="mb-5">
    @if ($label !='none')
        <x-form.label :$label :$required :$name />
    @endif
    <select
        name='{{ $name }}'
        id='{{ $name }}'
        {{ $required }}
        {{ $attributes->merge(['class' => 'border border-gray-300 bg-white dark:bg-gray-500 dark:text-gray-200 py-2 px-3 w-full rounded-md shadow']) }}
        @error($name)
            aria-invalid="true"
            aria-description="{{ $message }}"
        @enderror
    >
        @if ($placeholder != '')
           <option value=''>{{ $placeholder }}</option>
        @endif
        {{ $slot }}
    </select>
    @error($name)
        <p class="error" aria-live="assertive">{{ $message }}</p>
    @enderror
</div>
