<?php

use App\Http\Middleware\RedirectIfNotOwner;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

test('does not redirect when logged in as the owner', function () {
    $this->authenticate();

    $request = Request::create(route('dashboard'));

    $response = (new RedirectIfNotOwner())->handle($request, function () {
    });

    expect($response)->toBe(null);
});

test('redirects when logged in user is not the owner', function () {
    $user = User::factory()->create();

    $tenant = Tenant::create([
        'owner_id' => $user->id,
    ]);

    $secondUser = User::create([
        'tenant_id' => $tenant->id,
        'name' => 'Test User',
        'slug' => 'test-user',
        'email' => 'user@domain.com',
    ]);

    $this->actingAs($secondUser);

    $request = Request::create(route('admin.users.index'));

    $response = (new RedirectIfNotOwner())->handle($request, function () {
    });

    expect($response->getStatusCode())->toBe(302);
});
