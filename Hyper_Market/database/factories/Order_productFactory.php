<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Order_productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=> User::all()->random()->id,
            'order_id'=> Order::all()->random()->id,
            'product_id'=> Product::all()->random()->id,
            'price'=>'500.00',
            'quantity'=>'3',
        ];
    }
}
