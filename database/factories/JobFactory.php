<?php

namespace Database\Factories;

use App\Models\CareerLevel;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\JobType;
use App\Models\IndustryCategory;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "job_type_id" =>
                $this->faker->randomElement(JobType::pluck("id")->toArray()),
            "industry_category_id" =>
                $this->faker->randomElement(IndustryCategory::pluck("id")->toArray()),
            "career_level_id" =>
                $this->faker->randomElement(CareerLevel::pluck("id")->toArray()),
            "company_id" =>
                $this->faker->randomElement(Company::pluck("id")->toArray()),
            "country_id" =>
                $this->faker->randomElement(Country::pluck("id")->toArray()),
            "city_id" =>
                $this->faker->randomElement(City::pluck("id")->toArray()),
            "title" => $this->faker->jobTitle,
            "min_years_of_experience" => $this->faker->numberBetween(0, 3),
            "max_years_of_experience" => $this->faker->numberBetween(4, 8),
            "vacancies" => $this->faker->numberBetween(1, 10),
            "min_salary"=> $this->faker->randomElement([1000, 2000, 3000]),
            "max_salary"=> $this->faker->randomElement([4000, 5000, 6000]),
            "description" => $this->faker->paragraph,
            "requirements" => $this->faker->paragraph
        ];
    }
}
