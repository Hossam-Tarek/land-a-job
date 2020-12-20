<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("user",['except'=>'userdata']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("user.index", ["jobs" => Job::all()]);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function showJob(Job $job)
    {
        $title = $job->title;
        $description = $job->description;
        $descriptions = explode('.', $description);
        $related = Job::where('title', $title)->get();
        return view('user.show-job')->with('job', $job)
                                    ->with('related', $related)
                                    ->with('descriptions', $descriptions);
    }

    public function applyJob(Job $job)
    {

       if(Auth::user()->jobs->count() > 0)
        {
                if (!Auth::user()->jobs->contains($job))
                {
                    Auth::user()->jobs()->attach($job,['status'=>'Applied']);
                    return redirect()->back()->with(session()->flash('success','Job applied successfully'));
                }
                else
                {
                    Auth::user()->jobs()->sync($job, false);
                    return redirect()->back()->with(session()->flash('error','This job is Already applied !'));
                }
        }
        else
        {
            Auth::user()->jobs()->attach($job,['status'=>'Applied']);
            return redirect()->back()->with(session()->flash('success','Congratulations Job applied successfully'));
        }
    }

    public function userdata(User $user)
    {
            return view('user.show-user-profile')
                ->with('user',$user);
    }

    public function showApplications(){
        $user = Auth::user();
        $jobs = $user->jobs;
        return view("user.show-applications" , compact("user" , "jobs"));
    }

    public function countJobApplications(Request $request){

        $job =Job::find($request["job_id"]);
        $users = $job->users;
        $usersArray = $users -> toArray();

        $status = array();
        foreach($usersArray as $user){
            $pivot_status = $user["pivot"]["status"];
            $status[] = $pivot_status;
        }
        $notSelectedApplicationCount = count(array_keys($status, "Not selected"));
        $inConsiderationApplicationCount = count(array_keys($status, "In consideration"));
        $viewedApplicationCount = count(array_keys($status, "Viewed"));
        $appliedApplicationCount = count($usersArray);

        $job_application = [
            "viewedApplicationCount"=>$viewedApplicationCount,
            "notSelectedApplicationCount"=>$notSelectedApplicationCount,
            "inConsiderationApplicationCount"=>$inConsiderationApplicationCount,
            "appliedApplicationCount"=>$appliedApplicationCount,
            "job"=>$job,
            "city"=>$job->city->name,
            "country"=>$job->country->name
        ];
        return json_encode($job_application);
    }
}
