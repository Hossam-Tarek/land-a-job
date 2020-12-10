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
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'organization' => $this->faker->company,
            'grade' => $this->faker->randomElement(["Fair","Good","VeryGood","Excellent"]),
            'degree' => $this->faker->randomElement(["Bachelor's","Master's","Doctoral","Certificate"]),
            'field_of_study' => $this->faker->randomElement(["Business", "Technology", "Computer", "Pyschology", "Healthcare"]),
            'description' => $this->faker->sentence(5),
        ];
    }
}
