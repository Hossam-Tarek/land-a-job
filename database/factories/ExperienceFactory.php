<?php

namespace Database\Factories;

use App\Models\CareerLevel;
use App\Models\Experience;
use App\Models\IndustryCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'user_id'=>User::factory(),
            'industry_category_id'=>IndustryCategory::factory(),
            'career_level_id'=>CareerLevel::factory(),
            'title' => $this->faker->name,
            'start_date' => $this->faker->dateTime,
            'end_date' => $this->faker->dateTime,
            'company' => $this->faker->name,
            'description' => $this->faker->sentence(5),
        ];
    }
}
