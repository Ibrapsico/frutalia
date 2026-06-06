<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Crea un usuario automáticamente
            'category_id' => Category::factory(), // Crea una categoría automáticamente
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->optional()->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(0, 500),
        ];
    }
}
