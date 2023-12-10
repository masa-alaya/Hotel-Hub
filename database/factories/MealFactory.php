<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'category_id'=>$this->faker->numberBetween(1, 10),
            'logo'=>'',
            'description'=>$this->faker->paragraph(5),
            'price'=>$this->faker->numberBetween(5000, 25000),
            'points'=>$this->faker->numberBetween(10, 300),
        ];
    }
}
