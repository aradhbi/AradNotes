<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
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
            'content' => fake()->paragraphs(3, true),
            'views' => fake()->numberBetween(0, 1000),
            'category_id' => fake()->numberBetween(1, 10), // Assuming you have 10 categories
            'is_published' => fake()->boolean(),
            'slug' => fake()->unique()->slug(),
            'image' => fake()->imageUrl(),
            'meta_description' => fake()->sentence(),
            'meta_keywords' => fake()->words(3, true),
        ];
    }
}
