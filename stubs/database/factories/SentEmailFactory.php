<?php

namespace Database\Factories;

use App\Models\SentEmail;
use Illuminate\Database\Eloquent\Factories\Factory;

class SentEmailFactory extends Factory
{
    protected $model = SentEmail::class;

    public function definition(): array
    {
        return [
            'to'      => $this->faker->email(),
            'subject' => $this->faker->sentence(),
            'body'    => $this->faker->paragraph()
        ];
    }
}

