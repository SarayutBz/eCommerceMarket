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
            'name'=> 'Product'.rand(1,50),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigit(),
            'stockquantity' => rand(10,100),
            'imageurl' => $this->faker->imageUrl(640,480),
            'categoryID' => $this->faker->numberBetween(1, 5)
        ];
    }
}
