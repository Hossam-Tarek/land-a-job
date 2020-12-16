<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;
use App\Http\Requests\JobTypeRequest;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jobTypes.index')->with('jobTypes',JobType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.jobTypes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobTypeRequest $request)
    {
        JobType::create($request->all());
        return redirect()->route('jobTypes.index')
            ->with(session()->flash('success','jobType is created successfully .'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function show(JobType $jobType)
    {
    //return view('jobType.show')->with('jobType',$jobtype);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function edit(JobType $jobType)
    {
        return view('admin.jobTypes.edit')->with('jobtype',$jobType);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function update(JobTypeRequest $request, JobType $jobType)
    {
        $jobType->update($request->all());
        return redirect()->route('jobTypes.index')
                        ->with(session()->flash('success','jobType is Updated successfully .'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobType $jobType)
    {
        $jobType->delete();
        return redirect()->route('jobTypes.index')
                        ->with(session()->flash('success','jobType is Deleted successfully .'));
    }
}


