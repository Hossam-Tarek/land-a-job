<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerLevel;
use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Models\Skill;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Application;

class GuestController extends Controller
{
    public function mainPage(){
        $career_images=['career5.png','career1.jpg','career2.jpg','career3.jpg','career4.jpg','career6.jpg','career2.jpg'];
        $category_images=['category1.jpg','category2.jpg','category3.jpg','category4.jpg','category5.jpg','category2.jpg'];
        $city_images=['city1.jpg','city2.jpg','city3.jpg','city4.jpg','city5.jpg'];
              return view('guest.mainPage')->with('jobs',Job::orderBy('created_at', 'DESC')->get())
                                                ->with('careerlevels',CareerLevel::all())
                                                ->with('career',$career_images)
                                                ->with('category',$category_images)
                                                ->with('cities',City::all())
                                                ->with('city', $city_images)
                                                ->with('industries',IndustryCategory::all());
    }
}
