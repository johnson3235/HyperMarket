<?php

namespace Database\Factories;

use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer_Product>
 */
class Offer_productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id'=> Product::all()->random()->id,
            'offer_id'=> Offer::all()->random()->id,
            'price_after_discount'=>'500.00',
        ];
    }
}
