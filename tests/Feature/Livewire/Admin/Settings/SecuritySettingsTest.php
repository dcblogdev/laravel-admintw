<?php

use App\Livewire\Admin\Settings\SecuritySettings;
use App\Models\Setting;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('does decode json ips', function () {

    Setting::create([
        'key' => 'ips',
        'value' => '[{"ip":"120.0.0.1","comment":""}]',
    ]);

    $ips = Setting::where('key', 'ips')->value('value');

    Livewire::test(SecuritySettings::class)
        ->call('update')
        ->assertSet('ips', json_decode($ips, true));
});

test('can add row', function () {

    $ips = [];
    $ips[] = [
        'ip' => '',
        'comment' => '',
    ];

    Livewire::test(SecuritySettings::class)
        ->call('add')
        ->assertSet('ips', $ips);
});

test('can remove row', function () {

    $ips = [];
    $ips[] = [
        'ip' => '',
        'comment' => '',
    ];

    Livewire::test(SecuritySettings::class)
        ->call('add')
        ->assertSet('ips', $ips);

    Livewire::test(SecuritySettings::class)
        ->call('remove', 1)
        ->assertSet('ips', []);
});

test('can update', function () {

    Livewire::test(SecuritySettings::class)
        ->set('ips', [])
        ->call('update')
        ->assertOk();
});
