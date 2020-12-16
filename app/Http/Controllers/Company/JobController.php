<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Profile;
use App\Models\User;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getJobApplications($job){
        $job =Job::find($job);
        
        $users = $job->users;
        $usersArray = $users -> toArray();

        $status = array();
        foreach($usersArray as $user){
            $pivot_status = $user["pivot"]["status"];
            $status[] = $pivot_status; 
        }
        $SelectedApplicationCount = count(array_keys($status, "Selected"));
        $notSelectedApplicationCount = count(array_keys($status, "Not selected"));
        $inConsiderationApplicationCount = count(array_keys($status, "In consideration"));
        $viewedApplicationCount = count(array_keys($status, "Viewed"));
        $appliedApplicationCount = count($usersArray);

        return view("company.job_applications",compact("users", "job" ,"appliedApplicationCount","SelectedApplicationCount","inConsiderationApplicationCount","notSelectedApplicationCount","viewedApplicationCount"));
    }

    public function updateStatus(Request $request , $user_id ,$job_id){
        $user = User::find($user_id);
        $job = $user->jobs->where("id" , $job_id)->first();

        $job->pivot->status = $request["status"];
        $job->pivot->save();
        return back();
    }

    public function updateViewedStatus($user_id ,$job_id)
    {
        $user = User::findOrFail($user_id);
        $job = $user->jobs->where("id" , $job_id)->first();
        if($job->pivot->status == "Applied"){
            $job->pivot->status = "Viewed";
        }
        $job->pivot->save();
    }                           
}



