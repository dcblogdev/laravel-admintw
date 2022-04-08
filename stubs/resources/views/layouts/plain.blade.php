<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @stack('styles')
        <script src="{{ mix('js/app.js') }}" defer></script>
        @stack('scripts')
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
