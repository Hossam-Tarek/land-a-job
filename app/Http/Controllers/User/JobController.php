<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CareerLevel;
use App\Models\City;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class JobController extends Controller
{
    public function index(){

        $jobs = Job::orderBy('created_at','desc')->paginate(5);
        $countries = Country::orderby('name')->pluck('name', 'id');
        $cities = City::orderby('name')->pluck('name', 'id');
        $careerLevels = CareerLevel::orderby('name')->pluck('name', 'id');
        $jobCategories = IndustryCategory::orderby('name')->pluck('name', 'id');
        $jobTypes = JobType::orderby('name')->pluck('name', 'id');

        return view('user.job.index', compact('jobs', 'countries', 'cities', 'careerLevels', 'jobCategories', 'jobTypes'));
    }

    public function explore(){
        dd('explore');
    }
}
