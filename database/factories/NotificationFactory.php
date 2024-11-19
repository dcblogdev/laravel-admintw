<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Notification>
 */
class NotificationFactory extends Factory
{
    public function definition(): array
    {
        $user1 = User::factory()->make();
        $user2 = User::factory()->make();

        return [
            'title' => $this->faker->name(),
            'assigned_from_user_id' => $user1->id,
            'assigned_to_user_id' => $user2->id,
        ];
    }
}
