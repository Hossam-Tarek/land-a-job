<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
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
        return [
            "user_id" =>
                $this->faker->randomElement(User::pluck("id")->toArray()),
            "country_id" =>
                $this->faker->randomElement(Country::pluck("id")->toArray()),
            "city_id" =>
                $this->faker->randomElement(City::pluck("id")->toArray()),
            "number_of_employee_id" =>
                $this->faker->randomElement(NumberOfEmployee::pluck("id")->toArray()),
            "name" => $this->faker->unique()->company,
            "url" => $this->faker->unique()->url,
            "about" => $this->faker->paragraph,
            "founded_date" => $this->faker->date(),
            "logo" => $this->faker->image("public/avatar", 400, 400, null, false),
            "cover_image" => $this->faker->image("public/avatar", 800, 400, null, false)
        ];
    }
}
