@props([
    'label' => '',
    'name' => '',
    'required' => ''
])
<label aria-label="{{ $label }}" for="{{ $name }}" class="block mb-2 font-bold text-sm text-gray-600 dark:text-gray-200">{{ $label }} @if ($required != '') <span class="error">*</span>@endif</label>
