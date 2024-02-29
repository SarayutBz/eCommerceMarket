<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order>
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
        return [
            'orderID'=> rand(1,1000),
            'userID' => rand(1,250),
            'totalAmount' => $this->faker->randomNumber(4),
            'orederstatus' => rand(0,3),
        ];
    }
}
