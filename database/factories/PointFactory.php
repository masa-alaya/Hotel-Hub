<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'balance' => $this->faker->numberBetween(0, 50000),
            'points' => $this->faker->numberBetween(0, 10000)
        ];
    }
}
