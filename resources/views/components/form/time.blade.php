@props([
    'options' => [],
    'required' => '',
    'name' => '',
    'label' => '',
    'value' => '',
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

@php
    $options = array_merge([
        'enableTime' => true,
        'noCalendar' => true,
        'dateFormat' => "H:i",
        'time_24hr' => true
    ], $options);
@endphp

<div class="mb-5">
    @if ($label !='none')
        <x-form.label :$label :$required :$name />
    @endif
    <div class="mt-1 rounded-md shadow-sm">
        <input
            x-data
            x-init="flatpickr($refs.input, {{json_encode((object)$options)}});"
            x-ref="input"
            type="text"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $slot }}"
            {{ $required }}
            {{ $attributes->merge(['class' => 'mt-1 block w-full bg-white dark:bg-gray-500 dark:text-gray-200 dark:placeholder-gray-200 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm']) }}
            @error($name)
                aria-invalid="true"
                aria-description="{{ $message }}"
            @enderror
        >
        @error($name)
            <p class="error" aria-live="assertive">{{ $message }}</p>
        @enderror
    </div>
</div>
