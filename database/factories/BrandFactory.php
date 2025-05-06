<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_name' => fake()->company(),
            'brand_image' => fake()->imageUrl(),
            'brand_description' => fake()->text(2000),
            'rating' => fake()->numberBetween(0, 5),
            'is_best_rated' => fake()->boolean(),
            'is_popular' => fake()->boolean(),
            'website_link' => fake()->url(),
            'is_bonus_exclusive' => fake()->boolean(),
            'bonus_description' => fake()->text(30),
            'bonus_details' => fake()->text(25),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
