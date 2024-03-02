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
            'price' => $this->faker->randomNumber(4),
            'stockquantity' => 1,
            'imageurl' => $this->faker->imageUrl(640,480),
            'categoryID' => $this->faker->numberBetween(1, 3),
            'code' => rand(100, 999) . chr(rand(65, 90)) . rand(10, 99) . chr(rand(65, 90)),
        ];
    }
}
