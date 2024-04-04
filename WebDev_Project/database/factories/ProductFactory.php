<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'product_name' => $this->faker->name,
            'product_description' => $this->faker->sentence,
            'product_price' => $this->faker->randomFloat(2, 10, 100), // Random price between 10 and 100
            'product_image' => 'defaultproduct.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];
}
}
