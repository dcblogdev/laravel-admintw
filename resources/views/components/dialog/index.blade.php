<div
    x-data="{ dialogOpen: false }"
    x-modelable="dialogOpen"
    {{ $attributes }}
    tabindex="-1"
>
    {{ $slot }}
</div>
