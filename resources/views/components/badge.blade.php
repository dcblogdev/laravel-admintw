@php
    $class = "inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset ";

    $class .= " " . match($attributes->get("variant")) {
        default => "bg-primary text-white ring-primary/10",
        'gray' => "bg-gray-50 text-gray-700 ring-gray-700/10",
        'red', 'danger' => "bg-red-50 text-red-700 ring-red-700/10",
        'yellow' => "bg-yellow-50 text-yellow-700 ring-yellow-700/10",
        'green', 'success' => "bg-green-50 text-green-700 ring-green-700/10",
        'blue', 'info' => "bg-blue-50 text-blue-700 ring-blue-700/10",
        'indigo' => "bg-indigo-50 text-indigo-700 ring-indigo-700/10",
        'purple' => "bg-purple-50 text-purple-700 ring-purple-700/10",
        'pink' => "bg-pink-50 text-pink-700 ring-pink-700/10"
    };
@endphp

<div {{ $attributes->merge(["class" => $class])->except(['variant']) }}>
    <div class="flex items-center">
        {{ $slot }}
    </div>
</div>
