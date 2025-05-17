<?php

declare(strict_types=1);

use App\Models\Setting;

use function Pest\Laravel\get;

test('settings are applied', function () {
    $this->authenticate();

    Setting::create([
        'key' => 'app_name',
        'value' => 'Demo',
    ]);

    expect(Setting::first()->value)->toBe('Demo');

    get(route('dashboard'))->assertOk();
});
