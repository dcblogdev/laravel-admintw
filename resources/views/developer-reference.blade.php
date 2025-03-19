<x-layouts.app>
    @section('title', 'Developer Reference')

    <div class="md:flex">

    <!-- Sidebar with links (sticky on scroll) -->
    <div class="md:w-1/4 p-5 md:sticky top-0 h-full">
        <ul class="md:fixed overflow-x-auto space-y-2">
            <li><a class="text-primary" href="#basestyles">Base Styles</a></li>
            <li><a class="text-primary" href="#primaryColors">Primary Colors</a></li>
            <li><a class="text-primary" href="#error">Error</a></li>
            <li><a class="text-primary" href="#forms">Forms</a></li>
            <li><a class="text-primary" href="#alerts">Alerts</a></li>
            <li><a class="text-primary" href="#badges">Badges</a></li>
            <li><a class="text-primary" href="#buttons">Buttons</a></li>
            <li><a class="text-primary" href="#dropdown">Dropdown</a></li>
            <li><a class="text-primary" href="#modals">Modals</a></li>
            <li><a class="text-primary" href="#confirmmodals">Confirm Modals</a></li>
            <li><a class="text-primary" href="#tabs">Tabs</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="md:w-3/4 p-5">
        <p>All styles are powered by TailwindCss, having said that you may want to reuse style in easy ways. There are generally 2 options. Create a blade component or apply a CSS style.</p>

        <p>AdminTW provides a series or reusable CSS classes made up from TailwindCSS classes.</p>

        @include('docs.base-styles')
        @include('docs.primary-colour')
        @include('docs.error')
        @include('docs.forms')
        @include('docs.alerts')
        @include('docs.badges')
        @include('docs.buttons')
        @include('docs.dropdown')
        @include('docs.modals')
        @include('docs.tabs')
    </div>

</div>

</x-layouts.app>
