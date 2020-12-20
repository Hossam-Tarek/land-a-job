<?php

namespace App\Http\Controllers\User;

use App\Models\IndustryCategory;
use App\Models\Link;
use App\Models\NumberOfEmployee;
use App\Models\PhoneNumber;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("user");
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        $linksArray = Link::select('id', 'name', 'url')->where('user_id', auth()->user()->id)->get()->toArray();
        $phones = PhoneNumber::select('id', 'number')->where('user_id', auth()->user()->id)->get();
        $links = [];
        foreach ($linksArray as $oneLink) {
            if ($oneLink['name'] == 'facebook') {
                $links['facebook'] = $oneLink['url'];
                $links['facebook_id'] = $oneLink['id'];
            } elseif ($oneLink['name'] == 'twitter') {
                $links['twitter'] = $oneLink['url'];
                $links['twitter_id'] = $oneLink['id'];
            } elseif ($oneLink['name'] == 'linkedin') {
                $links['linkedin'] = $oneLink['url'];
                $links['linkedin_id'] = $oneLink['id'];
            } elseif ($oneLink['name'] == 'behance') {
                $links['behance'] = $oneLink['url'];
                $links['behance_id'] = $oneLink['id'];
            } elseif ($oneLink['name'] == 'instagram') {
                $links['instagram'] = $oneLink['url'];
                $links['instagram_id'] = $oneLink['id'];
            } elseif ($oneLink['name'] == 'github') {
                $links['github'] = $oneLink['url'];
                $links['github_id'] = $oneLink['id'];
            } elseif ($oneLink['name'] == 'stackoverflow') {
                $links['stackoverflow'] = $oneLink['url'];
                $links['stackoverflow_id'] = $oneLink['id'];
            } elseif ($oneLink['name'] == 'youtube') {
                $links['youtube'] = $oneLink['url'];
                $links['youtube_id'] = $oneLink['id'];
            }
        }

        return view("user.edit", [
            "user_id" => auth()->user()->id,
            "user" => $user,
            "links" => $links,
            'phones' => $phones,
            "industryCategories" => IndustryCategory::all(),
            "numberOfEmployees" => NumberOfEmployee::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function addPhone(Request $request)
    {
        $request->validate([
            'new_number' => 'required|unique:phone_numbers,number|digits_between:7,15',
        ]);
        PhoneNumber::create([
            'user_id' => auth()->user()->id,
            'number' => $request->new_number
        ]);
        return redirect()->back();
    }

    public function updatePhone(Request $request)
    {
        $request->validate([
            'edited_number' => 'required|numeric|digits_between:7,15',
        ]);
        if (PhoneNumber::where('number', $request->edited_number)->where('user_id', '!=', auth()->user()->id)->count() == 0) {
            PhoneNumber::where('id', $request->phone_id)->update(['number' => $request->edited_number]);
            return redirect()->back();
        } else {
            $errors['edited_number'] = 'This number has already been taken.';
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    public function deletePhone($id)
    {
        PhoneNumber::find($id)->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
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

        if (Auth::user()->jobs->count() > 0) {
            if (!Auth::user()->jobs->contains($job)) {
                Auth::user()->jobs()->attach($job, ['status' => 'Applied']);
                return redirect()->back()->with(session()->flash('success', 'Job applied successfully'));
            } else {
                Auth::user()->jobs()->sync($job, false);
                return redirect()->back()->with(session()->flash('error', 'This job is Already applied !'));
            }
        } else {
            Auth::user()->jobs()->attach($job, ['status' => 'Applied']);
            return redirect()->back()->with(session()->flash('success', 'Congratulations Job applied successfully'));
        }
    }

    public function showApplications()
    {
        $user = Auth::user();
        $jobs = $user->jobs;
        return view("user.show-applications", compact("user", "jobs"));
    }

    public function countJobApplications(Request $request)
    {

        $job = Job::find($request["job_id"]);
        $users = $job->users;
        $usersArray = $users->toArray();

        $status = array();
        foreach ($usersArray as $user) {
            $pivot_status = $user["pivot"]["status"];
            $status[] = $pivot_status;
        }
        $notSelectedApplicationCount = count(array_keys($status, "Not selected"));
        $inConsiderationApplicationCount = count(array_keys($status, "In consideration"));
        $viewedApplicationCount = count(array_keys($status, "Viewed"));
        $appliedApplicationCount = count($usersArray);

        $job_application = [
            "viewedApplicationCount" => $viewedApplicationCount,
            "notSelectedApplicationCount" => $notSelectedApplicationCount,
            "inConsiderationApplicationCount" => $inConsiderationApplicationCount,
            "appliedApplicationCount" => $appliedApplicationCount,
            "job" => $job,
            "city" => $job->city->name,
            "country" => $job->country->name
        ];
        return json_encode($job_application);
    }
}
