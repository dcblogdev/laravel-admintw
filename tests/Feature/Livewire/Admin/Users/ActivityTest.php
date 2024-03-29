<?php

use App\Livewire\Admin\Users\Activity;
use App\Models\AuditTrail;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can search user logs', function () {
    AuditTrail::factory()->create([
        'user_id' => auth()->user()->id,
        'title' => 'created job',
    ]);

    Livewire::test(Activity::class, ['user' => auth()->user()])
        ->set('title', 'created job')
        ->assertSet('title', 'created job')
        ->assertSee('created job');
});

test('can set property', function () {
    Livewire::test(Activity::class, ['user' => auth()->user()])
        ->set('sortField', 'title')
        ->assertSet('sortField', 'title');
});

test('can sort user logs', function () {

    AuditTrail::factory()->create([
        'user_id' => auth()->user()->id,
        'title' => 'created job',
    ]);

    AuditTrail::factory()->create([
        'user_id' => auth()->user()->id,
        'title' => 'viewed job',
    ]);

    Livewire::test(Activity::class, ['user' => auth()->user()])
        ->call('sortBy', 'title')
        ->assertSet('sortField', 'title')
        ->call('userLogs')
        ->assertOk()
        ->assertSeeInOrder(['created job', 'viewed job']);
});

test('can sort in desc', function () {

    AuditTrail::factory()->create([
        'user_id' => auth()->user()->id,
        'title' => 'created job',
    ]);

    AuditTrail::factory()->create([
        'user_id' => auth()->user()->id,
        'title' => 'viewed job',
    ]);

    Livewire::test(Activity::class, ['user' => auth()->user()])
        ->set('sortField', 'title')
        ->call('sortBy', 'title')
        ->assertSet('sortField', 'title')
        ->call('userLogs')
        ->assertOk()
        ->assertSeeInOrder(['viewed job', 'created job']);
});

test('can sort user logs by user', function () {
    Livewire::test(Activity::class, ['user' => auth()->user()])
        ->call('sortBy', 'user_id')
        ->assertSet('sortField', 'user_id')
        ->call('userLogs')
        ->assertStatus(200);
});

test('can filter', function () {

    AuditTrail::factory()->create([
        'user_id' => auth()->user()->id,
        'section' => 'jobs',
        'type' => 'create',
        'title' => 'created job',
        'created_at' => '2023-01-03 10:00:00',
    ]);

    AuditTrail::factory()->create([
        'user_id' => User::factory()->create(),
        'section' => 'tickets',
        'type' => 'view',
        'title' => 'viewed job',
        'created_at' => '2023-02-03 10:00:00',
    ]);

    Livewire::test(Activity::class, ['user' => auth()->user()])
        ->set('user_id', auth()->user()->id)
        ->set('section', 'jobs')
        ->set('type', 'create')
        ->set('created_at', '2023-01-01 to 2023-01-31')
        ->call('userLogs')
        ->assertOk()
        ->assertSet('openFilter', true)
        ->assertSee('created job')
        ->assertDontSee('viewed job');
});

test('can reset', function () {

    Livewire::test(Activity::class, ['user' => auth()->user()])
        ->set('title', 'jobs')
        ->set('section', 'jobs')
        ->set('type', 'create')
        ->set('created_at', '2023-01-01 to 2023-01-31')
        ->call('resetFilters')
        ->assertOk()
        ->assertSet('title', '')
        ->assertSet('section', '')
        ->assertSet('type', '')
        ->assertSet('created_at', '');
});
