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
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index()
    {
        $filters = json_decode(request()->filters); // posted data implicitly converted

        // initialize filters
        if ($filters) {
            $filters->countries = explode(',', $filters->countries);
            $filters->cities = explode(',', $filters->cities);
            $filters->careerLevel = explode(',', $filters->careerLevel);
            $filters->jobCategory = explode(',', $filters->jobCategory);
            $filters->jobType = explode(',', $filters->jobType);
            $filters->yearsOfExperience = json_decode($filters->yearsOfExperience);
        } else {
            $filters = new \stdClass();
            $filters->countries = $filters->cities = $filters->careerLevel = $filters->jobCategory = $filters->jobType = ['all'];
            $filters->yearsOfExperience = [];
            $filters->datePosted = 'all';
        }

        $searchKeyword = request()->q;
        if ($searchKeyword) {
            $jobs = Job::where('title', 'like', '%' . $searchKeyword . '%');
            $jobs = $jobs->where('status', true);

            // Check country
//            $filters->countries = [1, 2, 3];
            if ($filters->countries[0] !== 'all') {
                $jobs->whereIn('country_id', $filters->countries);
            }
//            Check cities
//            $filters->cities= [6, 20, 30];
            if ($filters->cities[0] !== 'all') {
                // Check city
                $jobs->whereIn('city_id', $filters->cities);
            }
            // Check career level
//            $filters->careerLevel = [1, 2];
            if ($filters->careerLevel[0] !== 'all') {
                $jobs->whereIn('career_level_id', $filters->careerLevel);
            }
            // Check job category
//            $filters->jobCategory = [1, 2];
            if ($filters->jobCategory[0] !== 'all') {
                $jobs->whereIn('industry_category_id', $filters->jobCategory);
            }
            // Check job type
//            $filters->jobType = [1, 2];
            if ($filters->jobType[0] !== 'all') {
                $jobs->whereIn('job_type_id', $filters->jobType);
            }
            // Check minimum years of experience
            if (isset($filters->yearsOfExperience->min)) {
                $jobs->where('min_years_of_experience', '>=', $filters->yearsOfExperience->min);
            }
            // Check maximum years of experience
            if (isset($filters->yearsOfExperience->max)) {
                $jobs->where('max_years_of_experience', '<=', $filters->yearsOfExperience->max);
            }
            // Check data posted
            if ($filters->datePosted !== 'all') {
                if ($filters->datePosted === 'day') {
                    $jobs->whereBetween('created_at', [\Illuminate\Support\Carbon::now()->addMinutes(120)->subDay(),
                        \Illuminate\Support\Carbon::now()->addMinutes(120)]);
                } else if ($filters->datePosted === 'week') {
                    $jobs->whereBetween('created_at', [\Illuminate\Support\Carbon::now()->addMinutes(120)->subWeek(),
                        \Illuminate\Support\Carbon::now()->addMinutes(120)]);
                } else if ($filters->datePosted === 'month') {
                    $jobs->whereBetween('created_at', [\Illuminate\Support\Carbon::now()->addMinutes(120)->subMonth(),
                        \Illuminate\Support\Carbon::now()->addMinutes(120)]);
                }
            }

            $jobsCount = $jobs->count();
            $jobs = $jobs->paginate(5);
        } else {
            $jobs = Job::paginate(5);
            $jobsCount = Job::orderBy('created_at', 'desc')->count();
        }

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
