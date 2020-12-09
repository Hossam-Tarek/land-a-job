<?php

namespace Database\Factories;

use App\Models\Education;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'start_date' => $this->faker->dateTime,
            'end_date' => $this->faker->dateTime,
            'organization' => $this->faker->name,
            'grade' => $this->faker->name,
            'degree' => $this->faker->name,
            'field_of_study' => $this->faker->name,
            'description' => $this->faker->sentence(5),
        ];
    }
}
