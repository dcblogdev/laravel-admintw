<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

test('http uses user agent', function () {
    Http::fake();

    Http::get(fake()->url);

    Http::assertSent(function (Request $request) {
        return $request->hasHeader('User-Agent', config('app.user_agent'));
    });
});
