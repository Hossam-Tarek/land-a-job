<?php

namespace Database\Factories;

use App\Models\CareerLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CareerLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CareerLevel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->unique()->name
        ];
    }
}
