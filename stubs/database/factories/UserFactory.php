<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name'           => $this->faker->name(),
            'slug'           => Str::slug($this->faker->name()),
            'email'          => $this->faker->safeEmail(),
            'password'       => Hash::make('password'),
            'is_active'      => 1,
            'remember_token' => Str::random(10),
        ];
    }
}
