<?php

use App\Models\Setting;

test('when not is_office_login_only, can access the dashboard from any IP address', function () {
    $this->authenticate();

    auth()->user()->update(['is_office_login_only' => false]);

    $this->get(route('dashboard'))->assertOk();
});

test('when is_office_login_only, cannot access the dashboard from unlisted IP address', function () {
    $this->authenticate();

    auth()->user()->update(['is_office_login_only' => true]);

    Setting::updateOrCreate(['key' => 'ips'], [
        'value' => json_encode([
            ['ip' => '10.158.67.124', 'label' => 'fake ip'],
        ]),
    ]);

    $this->get(route('dashboard'))->assertRedirect(route('login'));

    $this->assertGuest();
});

test('when is_office_login_only, can access the dashboard from listed IP address', function () {
    $this->authenticate();

    auth()->user()->update(['is_office_login_only' => true]);

    Setting::updateOrCreate(['key' => 'ips'], [
        'value' => json_encode([
            ['ip' => '127.0.0.1', 'label' => 'local ip'],
        ]),
    ]);

    $this->get(route('dashboard'))->assertOk();
});
