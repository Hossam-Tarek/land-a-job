<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\CareerLevel;
use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Application;
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

    public function getJobApplications($job){
        $job =Job::find($job);
        
        $applications = $job->applications;
        $applicationsArray = $applications -> toArray();
        // dd($applicationsArray);
        //Selected Applied Viewed   "In consideration"d" "Not selected" 
        // dd(array_count_values(array_column($applicationsArray, 'status')));

    //    dd(array_count_values(array_column(applicationsArray, 'status'))['Applied']); // outputs: 2
       
       $tempArray = array_count_values(array_column($applicationsArray, 'status'));
    //    $SelectedApplicationCount =$tempArray['Selected'];
    //    $notSelectedApplicationCount = $tempArray['Not selected'];
    //    $inConsiderationApplicationCount = $tempArray['In consideration'];

       isset($tempArray['Selected'])? $SelectedApplicationCount = $tempArray['Selected'] : $SelectedApplicationCount = 0;
       isset($tempArray['Not selected'])? $notSelectedApplicationCount = $tempArray['Not selected'] : $notSelectedApplicationCount = 0;
       isset($tempArray['In consideration'])? $inConsiderationApplicationCount = $tempArray['In consideration'] : $inConsiderationApplicationCount = 0;
       isset($tempArray['Viewed'])? $viewedApplicationCount = $tempArray['Viewed'] : $viewedApplicationCount = 0;

       $appliedApplicationCount = count($applicationsArray);
    //    dd($SelectedApplicationCount ,$notSelectedApplicationCount ,$inConsiderationApplicationCount, $viewedApplicationCount ,$appliedApplicationCount);
       

        // $job_applications = Application::where('job_id',$job->id);
        // $appliedApplicationCount =  $job_applications->where("status","=", "applied")->count();
        // $SelectedApplicationCount =  $job_applications->where("status","=", "selected")->count();
        // $inConsiderationApplicationCount =  $job_applications->where("status","=", "in consideration")->count();
        // $notSelectedApplicationCount =  $job_applications->where("status","=", "not selected")->count();
        // $viewedApplicationCount =  $job_applications->where("status","=", "viewed")->count();
        return view("company.job_applications",compact("applications","job" , "appliedApplicationCount","SelectedApplicationCount","inConsiderationApplicationCount","notSelectedApplicationCount","viewedApplicationCount"));
    }
}
