<?php

namespace Database\Factories;

use App\Models\ProductRating;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductRating>
 */
class ProductRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->optional()->paragraph(),
        ];
    }
}
