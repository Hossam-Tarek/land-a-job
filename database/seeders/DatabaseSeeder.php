<?php

namespace Database\Seeders;


use App\Models\CareerLevel;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Experience;

use App\Models\IndustryCategory;

use App\Models\JobTitle;
use App\Models\JobType;
use App\Models\Language;
use App\Models\Link;
use App\Models\PhoneNumber;
use App\Models\Skill;
use App\Models\User;


//use Database\Factories\EducationFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         User::factory()->has(Link::factory()->count(5))->create();
         Link::factory()->for(User::factory())->create();

        User::factory()->has(Certificate::factory()->count(5))->create();
        Certificate::factory()->for(User::factory())->create();

        User::factory()->has(Education::factory()->count(5))->create();
        Education::factory()->for(User::factory())->create();

        User::factory()->has(Language::factory()->count(5))->create();
        Language::factory()->for(User::factory())->create();

        User::factory()->has(PhoneNumber::factory()->count(5))->create();
        PhoneNumber::factory()->for(User::factory())->create();

         IndustryCategory::factory()->has(JobTitle::factory()->count(5))->create();
        JobTitle::factory()->for(IndustryCategory::factory())->create();

        CareerLevel::factory()->has(Experience::factory()->count(5))->create();
        Experience::factory()->for(CareerLevel::factory())->create();


        // Many To Many Factories RelationShip

        User::factory()->hasAttached(Skill::factory()->count(5))->create();
        User::factory()->hasAttached(JobType::factory()->count(5))->create();
        User::factory()->hasAttached(JobTitle::factory()->count(5))->create();

    }
}
