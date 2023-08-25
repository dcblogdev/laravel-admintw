<?php

use App\Livewire\Admin\AuditTrails;
use App\Models\AuditTrail;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can see user logs page', function () {
    $this
        ->get(route('admin.settings.audit-trails.index'))
        ->assertOk();
});

test('can search user logs', function () {
    AuditTrail::factory()->create(['title' => 'created job']);

    Livewire::test(AuditTrails::class)
        ->set('title', 'created job')
        ->assertSet('title', 'created job')
        ->assertSee('created job');
});

test('can set property', function () {
    Livewire::test(AuditTrails::class)
        ->set('sortField', 'title')
        ->assertSet('sortField', 'title');
});

test('can sort user logs', function () {
    Livewire::test(AuditTrails::class)
        ->call('sortBy', 'title')
        ->assertSet('sortField', 'title')
        ->call('userLogs')
        ->assertStatus(200);
});

test('can sort user logs by user', function () {
    Livewire::test(AuditTrails::class)
        ->call('sortBy', 'user_id')
        ->assertSet('sortField', 'user_id')
        ->call('userLogs')
        ->assertStatus(200);
});
