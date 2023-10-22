<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => Str::slug($this->faker->name()),
            'email' => $this->faker->safeEmail(),
            'password' => Hash::make('password'),
            'is_active' => 1,
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'image' => null,
            'two_fa_active' => 0,
            'two_fa_secret_key' => null,
            'is_office_login_only' => 0,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
