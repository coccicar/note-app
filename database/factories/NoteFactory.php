<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Note;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'content' => fake()->text(),
        ];
    }
}