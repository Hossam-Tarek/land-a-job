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
        $country_id = Country::all()->random()->id;
        $city_id = City::where("country_id", $country_id)->get()->random()->id;
        return [
            "job_type_id" =>
                $this->faker->randomElement(JobType::all()->pluck("id")->toArray()),
            "industry_category_id" =>
                $this->faker->randomElement(IndustryCategory::all()->pluck("id")->toArray()),
            "career_level_id" =>
                $this->faker->randomElement(CareerLevel::all()->pluck("id")->toArray()),
            "company_id" =>
                $this->faker->randomElement(Company::all()->pluck("id")->toArray()),
            "country_id" => $country_id,
            "city_id" => $city_id,
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
