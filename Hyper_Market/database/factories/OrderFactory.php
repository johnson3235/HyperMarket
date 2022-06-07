<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
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
            'statuses' => $this->faker->randomKey($array = [0,1,2,3]),
            'total_price' =>$this->faker->randomDigitNotNull(),
            'deliverd_data' => now(),
            'user_id'=>User::all()->random()->id,
            'product_id'=>Product::all()->random()->id,
        ];
    }
}
