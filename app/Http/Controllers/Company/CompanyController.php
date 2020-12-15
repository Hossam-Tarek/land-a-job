<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

use App\Http\Requests\JobRequest;
use App\Models\CareerLevel;
use App\Models\Skill;
use App\Models\Job;
use App\Models\JobType;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\NumberOfEmployee;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware("company");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("company.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("company.register", [
            "user_id" => auth()->user()->id,
            "countries" => Country::all(),
            "cities" => [],
            "industryCategories" => IndustryCategory::all(),
            "numberOfEmployees" => NumberOfEmployee::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        if (Company::where('name', $request->name)->count() == 0 && Company::where('url', $request->url)->count() == 0) {
            Company::create($request->all());
            return redirect(route("company"));
        } else {
            $errors = [];
            if (Company::where('name', $request->name)->count() > 0) {
                $errors['name'] = 'The name has already been taken.';
            }
            if (Company::where('url', $request->url)->count() > 0) {
                $errors['url'] = 'The url has already been taken.';
            }
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $company = Auth::user()->company;
        $phoneNumbers = Auth::user()->phoneNumbers;
        $links = Auth::user()->links;
        // dd($links);
        return view("company.show", compact("company", "links", "phoneNumbers"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company = auth()->user()->company;
        return view("company.edit", [
            "user_id" => auth()->user()->id,
            "company" => $company,
            "countries" => Country::all(),
            "cities" => City::where('country_id', $company->country_id)->get(),
            "industryCategories" => IndustryCategory::all(),
            "numberOfEmployees" => NumberOfEmployee::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        if (Company::where('name', $request->name)->where('user_id', '!=', auth()->user()->id)->count() == 0 && Company::where('url', $request->url)->where('user_id', '!=', auth()->user()->id)->count() == 0) {
            $company->update($request->all());
            return redirect(route("company.profile"));
        } else {
            $errors = [];
            if (Company::where('name', $request->name)->where('user_id', '!=', auth()->user()->id)->count() > 0) {
                $errors['name'] = 'The name has already been taken.';
            }
            if (Company::where('url', $request->url)->where('user_id', '!=', auth()->user()->id)->count() > 0) {
                $errors['url'] = 'The url has already been taken.';
            }
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    public function updateLogo(Request $request)
    {
        // validation
        $logoValidation = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $logoName = time() . auth()->user()->id . '.' . $request->logo->getClientOriginalExtension();
        if ($logoValidation->passes()) {
            $request->logo->move("avatar", $logoName);

            // Unlink old logo
            $path = auth()->user()->company->logo;
            if ($path)
                unlink(public_path("avatar/" . $path));

            // Update logo in DB
            Company::where('user_id', auth()->user()->id)
                ->where('id', auth()->user()->company->id)
                ->update(['logo' => $logoName]);

            // return success message
            return response()->json([
                'message'   => 'logo Uploaded Successfully',
                'class_name'  => 'alert alert-success',
                'status' => TRUE
            ]);
        } else {
            // return failure message
            return response()->json([
                'message'   => $logoValidation->errors()->all(),
                'class_name'  => 'alert alert-danger',
                'status' => False
            ]);
        }
    }

    public function updateCoverImage(Request $request)
    {
        // validation
        $logoValidation = Validator::make($request->all(), [
            'coverImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $coverImageName = time() . auth()->user()->id . '.' . $request->coverImage->getClientOriginalExtension();

        if ($logoValidation->passes()) {
            $request->coverImage->move("avatar", $coverImageName);

            // Unlink old coverImage
            $path = auth()->user()->company->cover_image;
            if ($path)
                unlink(public_path("avatar/" . $path));

            // Update coverImage in DB
            Company::where('user_id', auth()->user()->id)
                ->where('id', auth()->user()->company->id)
                ->update(['cover_image' => $coverImageName]);


            // return success message
            return response()->json([
                'message'   => 'Cover image Uploaded Successfully',
                'class_name'  => 'alert alert-success',
                'status' => TRUE
            ]);
        } else {
            // return failure message
            return response()->json([
                'message'   => $logoValidation->errors()->all(),
                'class_name'  => 'alert alert-danger',
                'status' => False
            ]);
        }
    }

    // Khaled => Jobs Operation
    public function allJobs()
    {
        $company = Auth::user()->company;
        $jobs = $company->jobs;
        return view('company.jobs.index')->with('jobs', $jobs);
    }

    public function addJob()
    {
        return view('company.jobs.create')->with('jobTypes', JobType::all())
            ->with('industryCategories', IndustryCategory::all())
            ->with('careerLevels', CareerLevel::all())
            ->with('companies', Company::all())
            ->with('countries', Country::all())
            ->with('skills', Skill::all())
            ->with('cities', City::all());
    }

    public function storeJob(JobRequest $request)
    {
        $job = Job::create([
            'title' => $request->title,
            'status' => $request->status,
            'job_type_id' => $request->job_type_id,
            "industry_category_id" => $request->industry_category_id,
            'career_level_id' => $request->career_level_id,
            'company_id' => $request->company_id,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'min_years_of_experience' => $request->min_years_of_experience,
            'max_years_of_experience' => $request->max_years_of_experience,
            'vacancies' => $request->vacancies,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'description' => $request->description,
            'requirements' => $request->requirements
        ]);
        $job->skills()->attach($request->skills);
        return redirect()->route('all-jobs.index')
            ->with(session()->flash('success', 'Job is created successfully .'));
    }

    public function showJob($id)
    {
        $job = Job::findOrFail($id);
        $title = $job->title;
        $description = $job->description;
        $descriptions = explode('.', $description);
        $related = Job::where('title', $title)->get();
        return view('company.jobs.show')->with('job', $job)
            ->with('related', $related)
            ->with('descriptions', $descriptions);
    }

    public function editJob($id)
    {
        return view('company.jobs.edit')->with('job', Job::findOrFail($id))
            ->with('industryCategories', IndustryCategory::all())
            ->with('careerLevels', CareerLevel::all())
            ->with('companies', Company::all())
            ->with('countries', Country::all())
            ->with('cities', City::all())
            ->with('skills', Skill::all())
            ->with('jobTypes', JobType::all());
    }

    public function updateJob(JobRequest $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update([
            'title' => $request->title,
            'status' => $request->status,
            'job_type_id' => $request->job_type_id,
            "industry_category_id" => $request->industry_category_id,
            'career_level_id' => $request->career_level_id,
            'company_id' => $request->company_id,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'min_years_of_experience' => $request->min_years_of_experience,
            'max_years_of_experience' => $request->max_years_of_experience,
            'vacancies' => $request->vacancies,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'description' => $request->description,
            'requirements' => $request->requirements
        ]);
        $job->skills()->sync($request->skills);
        return redirect()->route('all-jobs.index')
            ->with(session()->flash('success', 'Job is Updated successfully .'));
    }


    public function destroyJob($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return redirect()->route('all-jobs.index')
            ->with(session()->flash('success', 'Job is Deleted successfully .'));
    }
}
