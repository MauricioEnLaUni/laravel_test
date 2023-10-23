<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            "name" => fake()->sentence(),
            "description" => fake()->paragraph(),
            "starting" => fake()->dateTimeBetween("-30 days", "-1 days"),
            "ending" => fake()->dateTimeBetween("+1 days", "+30 days"),
            "completed_at" => null,
            "complete" => false,
            "next_task_id" => null,
            "parent_task_id" => null,
            "board_id" => 1
        ];
    }
}
