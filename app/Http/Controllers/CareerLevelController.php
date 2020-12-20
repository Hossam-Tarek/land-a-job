<?php

namespace App\Http\Controllers;

use App\Models\CareerLevel;
use Illuminate\Http\Request;
use App\Http\Requests\CareerLevelRequest;

class CareerLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.career-levels.index')->with('careerLevels',CareerLevel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.career-levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareerLevelRequest $request)
    {
        $request->validate([
            'name'=>'unique:career_levels'
        ]);
        CareerLevel::create([
            'name' =>$request->name
        ]);
        return redirect()->route('careerLevels.index')
            ->with(session()->flash('success','careerLevel is created successfully .'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CareerLevel  $careerLevel
     * @return \Illuminate\Http\Response
     */
    public function show(CareerLevel $careerLevel)
    {
        //return view('careerLevel.show')->with('careerLevel',$careerLevel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CareerLevel  $careerLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(CareerLevel $careerLevel)
    {
        return view('admin.career-levels.edit')->with('careerLevel',$careerLevel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CareerLevel  $careerLevel
     * @return \Illuminate\Http\Response
     */
    public function update(CareerLevelRequest $request, CareerLevel $careerLevel)
    {
        if (CareerLevel::where('name', $request->name)->where('id', '!=', $careerLevel->id)->count() == 0) {
            CareerLevel::where('id', $careerLevel->id)->update(['name' => $request->name]);
             return redirect()->route('careerLevels.index')
                        ->with(session()->flash('success','Career Level is updated successfully.'));
        }
        else{
            $err['name']='This career level is already exists';
            return redirect()->back()->withErrors($err)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CareerLevel  $careerLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CareerLevel $careerLevel)
    {
        $careerLevel->delete();
        return redirect()->route('careerLevels.index')
                        ->with(session()->flash('success','career level is deleted successfully.'));
    }
}
