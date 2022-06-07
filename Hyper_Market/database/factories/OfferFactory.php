<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'title'=>$this->faker->name(),
            'discount' =>$this->faker->randomDigitNotNull(),
            'discount_type' => $this->faker->randomKey($array =[0,1]),
            'start_date' => now(),
            'end_date'=>$this->faker->dateTimeBetween(now(),'+1 year'),
        ];
    }
}
