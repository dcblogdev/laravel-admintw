<?php

namespace Tests;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;
    use WithFaker;

    protected function prepareUser(): User
    {
        return User::factory()->create();
    }

    protected function authenticate(): User
    {
        $user = $this->prepareUser();
        $this->actingAs($user);

        return $user;
    }
}
