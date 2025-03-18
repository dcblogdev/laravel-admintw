@props([
    'type' => 'submit',
    'disabled' => false,
])

@php
$class = "inline-flex items-center font-medium ease-in-out disabled:opacity-50
disabled:cursor-not-allowed disabled:opacity-50 rounded-md cursor-pointer ";

$class .= " " . match($attributes->get("variant")) {
    default => "bg-primary text-white hover:bg-primary/90 shadow-md dark:bg-primary-dark dark:text-gray-200 dark:hover:bg-primary-dark/80",
    'gray' => "bg-gray-200 text-gray-700 hover:bg-gray-300/90 shadow-md dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700/90",
    'red' => "bg-red-500 text-red-200 hover:bg-red-500/90 shadow-md dark:bg-red-700 dark:text-red-100 dark:hover:bg-red-600/90",
    'yellow' => "bg-yellow-500 text-yellow-200 hover:bg-yellow-500/90 shadow-md dark:bg-yellow-600 dark:text-yellow-100 dark:hover:bg-yellow-500/90",
    'green' => "bg-green-500 text-green-200 hover:bg-green-500/90 shadow-md dark:bg-green-700 dark:text-green-100 dark:hover:bg-green-600/90",
    'blue' => "bg-blue-500 text-blue-200 hover:bg-blue-500/90 shadow-md dark:bg-blue-700 dark:text-blue-100 dark:hover:bg-blue-600/90",
    'indigo' => "bg-indigo-500 text-indigo-200 hover:bg-indigo-500/90 shadow-md dark:bg-indigo-700 dark:text-indigo-100 dark:hover:bg-indigo-600/90",
    'purple' => "bg-purple-500 text-purple-200 hover:bg-purple-500/90 shadow-md dark:bg-purple-700 dark:text-purple-100 dark:hover:bg-purple-600/90",
    'pink' => "bg-pink-500 text-pink-200 hover:bg-pink-500/90 shadow-md dark:bg-pink-700 dark:text-pink-100 dark:hover:bg-pink-600/90",
    'link' => "text-primary underline-offset-4 hover:underline dark:text-primary-light"
};

$class .= " " . match($attributes->get("size")){
    default => "px-4 py-2",
    'xs' => "px-2 py-1 text-sm",
    'sm' => "px-3 py-2 text-sm",
    'lg' => "px-6 py-3",
    'xl' => "px-8 py-4 ",
    'icon' => "size-10"
};

$disabledClasses = "opacity-50 cursor-not-allowed";

@endphp

<button
    type="{{ $type }}"
    @disabled($disabled)
    {{$attributes->merge(["class" => $class])->except(['size', 'variant'])}}
    >
    {{$slot}}
</button>
