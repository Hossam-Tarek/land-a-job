<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobTitleRequest;
use App\Models\IndustryCategory;
use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.job-titles.show')->with('jobtitles',JobTitle::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.job-titles.create')->with('industry',IndustryCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobTitleRequest  $request)
    {
        JobTitle::create($request->all());
        return redirect()->route('job-titles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(jobTitle $jobTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(jobTitle $jobTitle)
    {
        return view('admin.job-titles.edit')->with('jobTitle',$jobTitle)->with('industry',IndustryCategory::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(JobTitleRequest $request, jobTitle $jobTitle)
    {
        $jobTitle->update($request->all());
        return redirect()->route('job-titles.index',$jobTitle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(jobTitle $jobTitle)
    {
        $jobTitle->delete();
        return back()->with(session()->flash('success','Job title is deleted successfully.'));
    }
}
