<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\NumberOfEmployee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $country_id = array_rand(Country::all()->pluck("id")->toArray());
        $city_id = City::where("country_id", $country_id)->get()->random()->id;
        return [
            "user_id" => User::factory(),
            "country_id" => $country_id,
            "city_id" => $city_id,
            "number_of_employee_id" =>
                $this->faker->randomElement(NumberOfEmployee::all()->pluck("id")->toArray()),
            "industry_category_id" =>
                $this->faker->randomElement(IndustryCategory::all()->pluck("id")->toArray()),
            "name" => $this->faker->unique()->company,
            "url" => $this->faker->unique()->url,
            "about" => $this->faker->paragraph,
            "founded_date" => $this->faker->date(),
            "logo" => $this->faker->image("public/avatar", 400, 400, null, false),
            "cover_image" => $this->faker->image("public/avatar", 800, 400, null, false)
        ];
    }
}
