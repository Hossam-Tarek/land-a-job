<?php

namespace Database\Factories;

use App\Models\CareerLevel;
use App\Models\City;
use App\Models\Country;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" =>
                $this->faker->randomElement(User::pluck("id")->toArray()),
            "career_level_id" =>
                $this->faker->randomElement(CareerLevel::pluck("id")->toArray()),
            "country_id" =>
                $this->faker->randomElement(Country::pluck("id")->toArray()),
            "city_id" =>
                $this->faker->randomElement(City::pluck("id")->toArray()),
            "gender" => $this->faker->boolean,
            "min_salary" => $this->faker->randomElement([2000, 3000, 4000, 5000, 6000, 7000, 8000]),
            "military_status" => $this->faker->randomElement(["Exempted", "Completed", "Postponed", "Serving", "Does not apply"]),
            "education_level" => $this->faker->randomElement(["High School", "Bachelor's Degree", "Master's Degree", "Doctorate Degree"]),
            "job_title" => $this->faker->jobTitle
        ];
    }
}
