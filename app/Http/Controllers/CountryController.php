<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.countries.index')->with('countries',Country::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $request->validate([
            'name'=>'unique:countries'
        ]);
        Country::create([
            'name' =>$request->name
        ]);
        return redirect()->route('countries.index')
            ->with(session()->flash('success','Country is created successfully .'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //return view('countries.show')->with('country',$country);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit')->with('country',$country);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        if (Country::where('name', $request->name)->where('id', '!=', $country->id)->count() == 0) {
            Country::where('id', $country->id)->update(['name' => $request->name]);
             return redirect()->route('countries.index')
                        ->with(session()->flash('success','Country is Updated successfully .'));
        }else{
            $err['name']='This is already exist';
            return redirect()->back()->withErrors($err)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')
                        ->with(session()->flash('success','Country is Deleted successfully .'));
    }
}
