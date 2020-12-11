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
        return view('careerLevel.index')->with('careerLevels',CareerLevel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('careerLevel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareerLevelRequest $request)
    {
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
        return view('careerLevel.edit')->with('careerLevel',$careerLevel);
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
        $careerLevel->update([
            'name' =>$request->name
        ]);
        return redirect()->route('careerLevels.index')
                        ->with(session()->flash('success','careerLevel is Updated successfully .'));
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
                        ->with(session()->flash('success','CareerLevel is Deleted successfully .'));
    }
}
