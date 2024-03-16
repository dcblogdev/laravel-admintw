<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserNotTenantOwnerFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => Str::slug($this->faker->name()),
            'email' => $this->faker->email(),
            'password' => Hash::make('password'),
            'is_active' => 1,
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'image' => null,
            'two_fa_active' => false,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            $adminUser = User::factory()->create();
            $user->tenant_id = $adminUser->tenant_id;
        });
    }
}
