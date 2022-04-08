<div class="bg-gray-200 dark:bg-gray-700 dark:text-white min-h-screen bg-gray-50 dark:bg-gray-700 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <section class="hero container max-w-screen-lg mx-auto text-center">
        @php
            //cache the logo setting to reduce calling the database
            $loginLogo = Cache::rememberForever('loginLogo', function () {
                return \App\Models\Setting::where('key', 'loginLogo')->value('value');
            });

            $loginLogoDark = Cache::rememberForever('loginLogoDark', function () {
                return \App\Models\Setting::where('key', 'loginLogoDark')->value('value');
            });
        @endphp

        <a href="{{ url('admin') }}">
            @if (storage_exists($loginLogo))
                <picture>
                    <source srcset="{{ Storage::url($loginLogoDark) }}" media="(prefers-color-scheme: dark)">
                    <img class="mx-auto" src="{{ Storage::url($loginLogo) }}" alt="{{ config('app.name') }}">
                </picture>
            @else
                <h1>{{ config('app.name') }}</h1>
            @endif
        </a>
    </section>

    <div class="w-full sm:max-w-md mt-6 mb-10 px-6 py-4 bg-white dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
