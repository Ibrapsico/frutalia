<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductRating;

class ProductRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductRating::factory()
            ->count(10)
            ->state([
                'rating' => 5,
                'comment' => '¡Excelente producto!'
            ])
            ->create();
    }
}
