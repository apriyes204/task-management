<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => fake()->text(),
            'status' => fake()->randomElement(['pending', 'completed']),
            'image_path' =>  'assets/gallery/' . $this->faker->image('public\storage\assets\gallery', 640, 480, null, false),
            'user_id' =>  User::factory(),
        ];
    }
}
