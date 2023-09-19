<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logs>
 */
class LogsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'change' => 'Subtítulo atualizado',
            'user_id' => User::factory(),
            'user_name' => function (array $attributes) {
                return User::find($attributes['user_id'])->name;
            },
            'value' => fake()->paragraph(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
