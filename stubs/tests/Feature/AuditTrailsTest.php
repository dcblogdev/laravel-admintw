<?php

use App\Http\Livewire\Admin\AuditTrails;
use App\Models\AuditTrail;
use function Pest\Livewire\livewire;

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

    livewire(AuditTrails::class)
        ->set('title', 'created job')
        ->assertSet('title', 'created job')
        ->assertSee('created job');
});

test('can set property', function () {
    livewire(AuditTrails::class)
        ->set('sortField', 'title')
        ->assertSet('sortField', 'title');
});

test('can sort user logs', function () {
    livewire(AuditTrails::class)
        ->call('sortBy', 'title')
        ->assertSet('sortField', 'title')
        ->call('userLogs')
        ->assertStatus(200);
});

test('can sort user logs by user', function () {
    livewire(AuditTrails::class)
        ->call('sortBy', 'user_id')
        ->assertSet('sortField', 'user_id')
        ->call('render')
        ->assertStatus(200);
});
