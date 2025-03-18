@props([
    'type' => 'submit',
])

@php
$class = "inline-flex items-center border shadow-sm border-transparent font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary focus:ring-offset-background transition duration-150 ease-in-out disabled:opacity-50
disabled:pointer-events-none disabled:opacity-50 rounded-md cursor-pointer ";

// Ensure proper spacing when concatenating classes
$class .= " " . match($attributes->get("variant")){
    default => "bg-primary text-white hover:bg-primary/90",
    'destructive' => "bg-red-500 text-white hover:bg-red-500/90",
    'outline' => "border border-input bg-background hover:bg-accent hover:text-accent-foreground",
    'secondary' => "bg-secondary text-secondary-foreground hover:bg-secondary/80",
    'ghost' => "hover:bg-accent hover:text-accent-foreground",
    'link' => "text-primary underline-offset-4 hover:underline"
};

$class .= " " . match($attributes->get("size")){
    default => "px-4 py-2",
    'xs' => "px-2 py-1 text-sm",
    'sm' => "px-3 py-2 text-sm",
    'lg' => "px-6 py-3",
    'xl' => "px-8 py-4 ",
    'icon' => "size-10"
};
@endphp

<button type="{{ $type }}" {{$attributes->merge(["class" => $class])->except(['size', 'variant'])}}
    >
    {{$slot}}
</button>
