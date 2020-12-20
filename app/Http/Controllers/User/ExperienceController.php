<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use App\Models\CareerLevel;
use App\Models\User;
use App\Models\IndustryCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("user");
    }

    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.experiences.create')->with('users',User::all())
        ->with('industryCategories',IndustryCategory::all())
        ->with('careerLevels',CareerLevel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceRequest $request)
    {
        $user_id = auth()->user()->id;
        $request->user_id = $user_id;
        Experience::create($request->all());
        return redirect()->route('user.edit',$user_id);
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
    public function edit(Experience $experience)
    {
        return view('user.experiences.edit')->with('experience',$experience)
        ->with('industryCategories',IndustryCategory::all())
        ->with('careerLevels',CareerLevel::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceRequest $request,Experience $experience)
    {
        $user_id = auth()->user()->id;
        $request->user_id = $user_id;
        $experience->update($request->all());
        return redirect()->route('user.edit',$user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->back();
    }
}
