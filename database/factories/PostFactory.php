<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'            => fake()->words(6, true),
            'slug'             => fake()->slug(),
            'content'          => fake()->paragraphs(5, true),
            'excerpt'          => fake()->text(200),
            'published_at'     => fake()->optional(0.7)->dateTimeBetween('-1 year', 'now'),
            'is_published'     => fake()->boolean(70),
            'meta_title'       => fake()->optional(0.6)->words(8, true),
            'meta_description' => fake()->optional(0.6)->text(160),
        ];
    }
}
