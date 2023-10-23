<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            "name" => fake()->sentence(),
            "user_id" => 1,
            "started_at" => fake()->dateTimeBetween("-30 days", "-1 days"),
            "ends" => fake()->dateTimeBetween("+1 days", "+30 days"),
            "complete" => false,
            "project_type_id" => 1
        ];
    }
}
