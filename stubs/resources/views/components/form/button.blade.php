@props([
    'type' => 'submit'
])

<div>
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-1.5 mt-5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition ease-in-out duration-150"]) }}>
        {{ $slot }}
    </button>
</div>
