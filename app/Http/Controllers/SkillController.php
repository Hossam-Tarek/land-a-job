<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Http\Requests\SkillRequest;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.skills.index')->with('skills',Skill::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        Skill::create([
            'name' => $request->name,
            'year_of_experience' => $request->year_of_experience,
            'proficiency' => $request->proficiency
        ]);
        return redirect()->route('skills.index')
            ->with(session()->flash('success','Skill is created successfully .'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //return view('skills.show')->with('skill',$skill);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit')->with('skill',$skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, Skill $skill)
    {

        $skill->update([
            'name' => $request->name,
            'year_of_experience' => $request->year_of_experience,
            'proficiency' => $request->proficiency
        ]);
        return redirect()->route('skills.index')
                        ->with(session()->flash('success','skill is Updated successfully .'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {

        $skill->delete();
        return redirect()->route('skills.index')
                        ->with(session()->flash('success','Skill is Deleted successfully .'));
    }
}
