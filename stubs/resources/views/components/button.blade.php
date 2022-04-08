@props(['type' => 'submit'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-primary']) }}>
    {{ $slot }}
</button>