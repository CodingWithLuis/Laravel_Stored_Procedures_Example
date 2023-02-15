<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_number' => rand(1000, 9999),
            'customer_id' => rand(1, 10),
            'status' => fake()->randomElement(['pendiente', 'cancelada', 'finalizada']),
        ];
    }
}
