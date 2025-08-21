<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Generate a sentence-like name with a random word for variation
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(3), // Generate a 3-paragraph description
        ];
    }
}