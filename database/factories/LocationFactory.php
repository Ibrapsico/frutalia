<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Location>
 */
class LocationFactory extends Factory
{



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'zone_id' => Zone::factory(),
            'name' => $this->faker->optional()->company(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'cp' => $this->faker->numberBetween(01000, 52999),
        ];
    }
}
