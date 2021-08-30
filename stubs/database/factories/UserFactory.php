<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class UserFactory extends Factory
{
    protected $model = User::class;

    #[ArrayShape([
        'name'     => "string",
        'email' => "string",
        'email_verified_at' => "\Illuminate\Support\Carbon",
        'password' => "string",
        'remember_token' => "string"
    ])]
    public function definition(): array
    {
        return [
            'name'              => $this->faker->name(),
            'email'             => $this->faker->email(),
            'email_verified_at' => now(),
            'password'          => Hash::make('secret'),
            'remember_token'    => Str::random(10),
        ];
    }

    public function unverified(): UserFactory
    {
        return $this->state(function () {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
