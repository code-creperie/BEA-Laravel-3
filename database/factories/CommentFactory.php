<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'author' => $this->faker->name(),
            'comment_text' => $this->faker->sentence(10), 
        ];
    }
}