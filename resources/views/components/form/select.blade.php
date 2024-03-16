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
        <label for='{{ $name }}' class='block mb-2 font-bold text-sm text-gray-600 dark:text-gray-200'>{{ $label }} @if ($required != '') <span class="error">*</span>@endif</label>
    @endif
    <select name='{{ $name }}' id='{{ $name }}' {{ $required }} {{ $attributes->merge(['class' => 'border border-gray-300 dark:bg-gray-500 dark:text-gray-200 p-1 w-full rounded']) }}>
    @if ($placeholder != '')
       <option value=''>{{ $placeholder }}</option>
    @endif
    {{ $slot }}
    </select>
    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</div>
