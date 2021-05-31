<div class="overflow-x-auto bg-white dark:bg-gray-400 rounded overflow-y-auto mb-5">
    <table {{ $attributes->merge(['class' => 'w-full table-auto']) }}>
        {{ $slot }}
    </table>
</div>
