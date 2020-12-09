<?php

namespace Database\Factories;

use App\models\Certificate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'name' => $this->faker->name,
            'awarded_date' => $this->faker->dateTime,
            'organization' => $this->faker->name,
            'certificate_url' => $this->faker->url,
        ];
    }
}
