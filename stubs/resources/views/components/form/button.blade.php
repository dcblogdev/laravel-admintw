@props([
    'type' => 'submit'
])

<div>
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "inline-flex items-center px-3 py-2 mt-5 border border-transparent text-xs font-medium rounded text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue"]) }}>
        {{ $slot }}
    </button>
</div>
