<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Company;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::all();
        return view('applications.index')
            ->with('applications', $applications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobsId = Job::pluck('id')->toArray();
        return view('applications.create' , compact('jobsId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
        [
            'job' => 'required|exists:jobs,id',
        ]);

        $job_id = request("job_id");
        $status = request("status");

        Application::create([
            "job_id"=>$job_id,
            "status"=>$status
        ]);
        return redirect(route('applications.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::find($id);
        $users = $application->users;
        $job = $application->job;
        $job_name = JobType::select('name')->where('id', $job->job_type_id)->first();
        $company_name = Company::select('name')->where('id', $job->company_id)->first();

        return view('applications.show' , compact('application','users','job_name','company_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::find($id);
        $jobsId = Job::pluck('id')->toArray();
        return view('applications.edit' , compact('jobsId','application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $application = Application::find($id);
        $this->validate(request(),
        [
            'job' => 'required|exists:jobs,id',
        ]);

        $job_id = request("job_id");
        $status = request("status");
        
        $application ->update([
            "job_id"=>$job_id,
            "status"=>$status
        ]);
        return view('applications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application =  Application::find($id);
        $application->delete();
        return back();
    }
}