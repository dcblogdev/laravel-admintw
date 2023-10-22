<?php

use App\Models\Setting;

test('settings are applied', function () {
    $this->authenticate();

    Setting::create([
        'key' => 'app_name',
        'value' => 'Demo',
    ]);

    expect(Setting::first()->value)->toBe('Demo');

    $this
        ->get(route('dashboard'))
        ->assertOk();
});
