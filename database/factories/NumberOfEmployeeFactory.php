<?php

namespace Database\Factories;

use App\Models\NumberOfEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

class NumberOfEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NumberOfEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "min" => $this->faker->randomElement([0, 50, 100]),
            "max" => $this->faker->randomElement([100, 200, 500, 1000, 5000])
        ];
    }
}
