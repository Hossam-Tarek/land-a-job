<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\CareerLevel;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobs.index')->with('jobs',Job::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create')->with('jobTypes',JobType::all())
                                 ->with('industryCategories',IndustryCategory::all())
                                 ->with('careerLevels',CareerLevel::all())
                                 ->with('companies',Company::all())
                                 ->with('countries',Country::all())
                                 ->with('cities',City::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        Job::create($request->all());
        return redirect()->route('jobs.index')
            ->with(session()->flash('success','Job is created successfully .'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('jobs.show')->with('job',Job::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('jobs.edit')->with('job',Job::findOrFail($id))
                                ->with('industryCategories',IndustryCategory::all())
                                ->with('careerLevels',CareerLevel::all())
                                ->with('companies',Company::all())
                                ->with('countries',Country::all())
                                ->with('cities',City::all())
                                ->with('jobTypes',JobType::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        $job=Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->route('jobs.index')
                        ->with(session()->flash('success','Job is Updated successfully .'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job=Job::findOrFail($id);
        $job->delete();
        return redirect()->route('jobs.index')
                        ->with(session()->flash('success','Job is Deleted successfully .'));
    }
}
