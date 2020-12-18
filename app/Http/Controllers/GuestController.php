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
        $career=['5.png','1.jpg','2.jpg','3.jpg','4.jpg','6.jpg','2.jpg'];
        $category=['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','2.jpg'];
        $city=['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg'];
              return view('guest.mainPage')->with('jobs',Job::orderBy('created_at', 'DESC')->get())
                                                ->with('careerlevels',CareerLevel::all())
                                                ->with('career',$career)
                                                ->with('category',$category)
                                                ->with('cities',City::all())
                                                ->with('city',$city)
                                                ->with('industries',IndustryCategory::all());
    }
}
