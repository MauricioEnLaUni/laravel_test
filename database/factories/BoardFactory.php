<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Board;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    public function definition(): array
    {
        return [
            "user_id" => 1,
            "project_id" => 1,
            "name" => fake()->sentence(),
            "description" => fake()->paragraph(3),
        ];
    }
}
