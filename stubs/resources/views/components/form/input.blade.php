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
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{ $label }} @if ($required != '') <span class="text-red-600">*</span>@endif</label>
    @endif
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $slot }}"
        {{ $required }}
        {{ $attributes->merge(['class' => 'block w-full dark:bg-gray-500 dark:text-gray-200 dark:placeholder-gray-200 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none sm:text-sm']) }}>
    @error($name)
        <p class="text-red-500">{{ $message }}</p>
    @enderror
</div>

