@php
    $class = "rounded-md shadow-md text-sm p-4 my-5 ";

    $class .= " " . match($attributes->get("variant")) {
        default => "bg-primary text-white dark:bg-primary-dark dark:text-gray-200",
        'gray' => "bg-gray-500 text-gray-200 dark:bg-gray-800 dark:text-gray-300",
        'red', 'danger' => "bg-red-500 text-red-200 dark:bg-red-700 dark:text-red-100",
        'yellow' => "bg-yellow-500 text-yellow-200 dark:bg-yellow-600 dark:text-yellow-100",
        'green', 'success' => "bg-green-500 text-green-200 dark:bg-green-700 dark:text-green-100",
        'blue', 'info' => "bg-blue-500 text-blue-200 dark:bg-blue-700 dark:text-blue-100",
        'indigo' => "bg-indigo-500 text-indigo-200 dark:bg-indigo-700 dark:text-indigo-100",
        'purple' => "bg-purple-500 text-purple-200 dark:bg-purple-700 dark:text-purple-100",
        'pink' => "bg-pink-500 text-pink-200 dark:bg-pink-700 dark:text-pink-100",
        'link' => "text-primary underline-offset-4 hover:underline dark:text-primary-light"
    };
@endphp

<div {{$attributes->merge(["class" => $class])->except(['variant'])}}>
    <div class="flex items-center">
        {{ $slot }}
    </div>
</div>
