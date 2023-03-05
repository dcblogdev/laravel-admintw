@props([
    'required' => '',
    'type' => 'text',
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

<div class="mb-5">
    @if ($label !='none')
        <label for="{{ $name }}" class="block text-sm font-medium leading-5 text-gray-700 dark:text-gray-200">{{ $label }} @if ($required != '') <span class="error">*</span>@endif</label>
    @endif
    <div class="rounded-md shadow-sm">
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $slot }}"
            {{ $required }}
            {{ $attributes->merge(['class' => 'block w-full dark:bg-gray-500 dark:text-gray-200 dark:placeholder-gray-200 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm']) }}>
        @error($name)
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
</div>

