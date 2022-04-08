<?php

namespace Database\Factories\Roles;

use App\Models\Roles\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'label' => $this->faker->name(),
            'module' => $this->faker->name()
        ];
    }
}
