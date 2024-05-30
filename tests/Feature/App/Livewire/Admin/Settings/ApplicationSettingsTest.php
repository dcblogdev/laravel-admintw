<?php

use App\Livewire\Admin\Settings\ApplicationSettings;
use App\Models\Setting;
use Livewire\Livewire;

test('can see settings page', function () {
    $this->authenticate();
    $this->get(route('admin.settings'))->assertOk();
});

test('cannot see system settings without permissions', function () {
    $this->authenticate('user');
    $this->get(route('admin.settings'))->assertForbidden();
});

test('can set name', function () {
    $this->authenticate();
    Livewire::test(ApplicationSettings::class)
        ->set('siteName', 'Demo')
        ->call('update')
        ->assertHasNoErrors(['siteName' => 'required']);

    expect(Setting::where('key', 'app.name')->value('value'))->toBe('Demo');
});

test('can set forced 2fa', function () {
    $this->authenticate();
    Livewire::test(ApplicationSettings::class)
        ->set('siteName', 'Demo')
        ->set('isForced2Fa', true)
        ->call('update')
        ->assertHasNoErrors(['siteName' => 'required']);

    expect(Setting::where('key', 'is_forced_2fa')->value('value'))->toBe('1');
});

test('data does not exist by default', function () {
    $this->authenticate();

    expect(Setting::where('key', 'is_forced_2fa')->value('value'))->toBeNull;
    expect(Setting::where('key', 'app.name')->value('value'))->toBeNull;
});
