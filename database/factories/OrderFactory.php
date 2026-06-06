<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $statuses = ['pendiente', 'procesando', 'completado'];

        return [
            'user_id' => User::inRandomOrder()->first('id') ?? User::factory(),
            'location_id' => Location::inRandomOrder()->first('id') ?? Location::factory(),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
