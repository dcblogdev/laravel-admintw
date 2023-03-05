<div>
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

        <a href="{{ route('dashboard') }}">
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

    {{ $slot }}

</div>
