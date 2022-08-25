<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{User, Category};
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'category_id' => Category::factory()->create()->id,
            'title' => fake()->sentence(),
            'excerpt' => fake()->sentence(),
            'slug' => fake()->slug(),
            'body' => fake()->paragraph()
        ];
    }
}
