<div>
    <section {{ $attributes->merge(['class' => 'hero container max-w-screen-lg mx-auto text-center']) }}>
        <a href="{{ route('dashboard') }}">
            <h1>{{ config('app.name') }}</h1>
        </a>
    </section>

    {{ $slot }}
</div>
