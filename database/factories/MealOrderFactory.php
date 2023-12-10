<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MealOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id'=>$this->faker->numberBetween(1,2),
            'meal_id'=>$this->faker->numberBetween(1,3),
            'meal_price'=>$this->faker->numberBetween(5000, 12000),
            'quantity'=>$this->faker->numberBetween(1,3),
        ];
    }
}
