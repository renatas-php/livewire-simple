<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Product>
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
            'manufacturer_id' => \App\Models\Product\Manufacturer::inRandomOrder()->take(1)->pluck('id')->toArray()[0],
            'name' => fake()->name(),
            'description' => fake()->text(100),
            'price' => rand(20, 10000),
            'stock' => rand(1, 10000)
        ];
    }
}
