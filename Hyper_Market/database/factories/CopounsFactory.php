<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Copouns>
 */
class CopounsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->name(),
            'name_ar' => $this->faker->name_ar,
            'email' => $this->faker->unique()->safeEmail(),
            'type' =>'Marketing',
            // 'type' =>'Inventory',
            'salary'=>'2500.50',
            'email_verified_at' => now(),
           
        ];
    }
}
