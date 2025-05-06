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
            'brand_image' => "https://images.seeklogo.com/logo-png/25/1/betclic-logo-png_seeklogo-259942.png",
            'brand_description' => fake()->text(400),
            'rating' => fake()->numberBetween(0, 5),
            'is_best_rated' => fake()->boolean(),
            'is_popular' => fake()->boolean(),
            'website_link' => fake()->url(),
            'is_bonus_exclusive' => fake()->boolean(),
            'bonus_description' => "200% jusqu'à 500€",
            'bonus_details' => "+ 500 Tours Gratuits",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
