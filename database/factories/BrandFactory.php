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
            'rating' => fake()->numberBetween(0, 5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
