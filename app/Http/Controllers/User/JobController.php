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
    public function index()
    {
        $filters = json_decode(request()->filters);
        if($filters){
            $filters->countries = explode(',', $filters->countries);
            $filters->cities = explode(',', $filters->cities);
            $filters->careerLevel = explode(',', $filters->careerLevel);
            $filters->jobCategory = explode(',', $filters->jobCategory);
            $filters->jobType = explode(',', $filters->jobType);
            $filters->yearsOfExperience =json_decode($filters->yearsOfExperience);
        } else {
            $filters = new \stdClass();
            $filters->countries = $filters->cities = $filters->careerLevel = $filters->jobCategory = $filters->jobType = ['all'];
            $filters->yearsOfExperience = $filters->datePosted = [];
        }

        $searchKeyword = request()->q;
        $jobsCount = Job::orderBy('created_at', 'desc')->count();
        $jobs = Job::orderBy('created_at', 'desc')->paginate(5);
        $jobsMinExperience = Job::select('min_years_of_experience')->distinct()->orderBy('min_years_of_experience')->get();
        $jobsMaxExperience = Job::select('max_years_of_experience')->distinct()->orderBy('max_years_of_experience')->get();
        $countries = Country::orderby('name')->pluck('name', 'id');
        $cities = City::orderby('name')->pluck('name', 'id');
        $careerLevels = CareerLevel::orderby('name')->pluck('name', 'id');
        $jobCategories = IndustryCategory::orderby('name')->pluck('name', 'id');
        $jobTypes = JobType::orderby('name')->pluck('name', 'id');

        return view('user.job.index', compact('jobs', 'jobsCount', 'countries', 'cities',
            'careerLevels', 'jobCategories', 'jobTypes', 'searchKeyword',
            'jobsMinExperience', 'jobsMaxExperience', 'filters'));
    }

    public function explore()
    {
        dd('explore');
    }
}
