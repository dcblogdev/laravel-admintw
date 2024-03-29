@props([
    'name'
])

<a
    x-on:click="tab = '{{ $name }}'"
    x-bind:class="{ 'border-blue-600 hover:border-blue-700 text-blue-600 hover:text-blue-700 dark:border-blue-300 dark:hover:border-blue-400 dark:text-blue-300 dark:hover:text-blue-400': tab === '{{ $name }}' }"
    @click.prevent="tab = '{{ $name }}'; window.location.hash = '{{ $name }}'"
    href="#" {{ $attributes->merge(['class' => "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-300 dark:hover:text-gray-400 dark:hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"]) }}
>
  {{ $slot }}
</a>