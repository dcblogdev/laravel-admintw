@props([
    'value' => '',
    'selected' => ''
])

<option value="{{ $value }}" @if($selected == $value) selected=selected @endif {{ $attributes }}>{{ $slot }}</option>
