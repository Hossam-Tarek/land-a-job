<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\CareerLevel;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("profiles.index", ["profiles" => Profile::all()]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $users =User::select('id' , 'email')->get();
        $countries = Country::all();
        $cities = City::all();
        $careerLevels = CareerLevel::all();
        return view('profiles.create' , compact(['users','countries','cities','careerLevels']));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        Profile::create($request->all());
        return redirect(route('profiles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  //userId
    {
        $user_id = $id;
        $profile = Profile::where('user_id', '=', $id)->first();
        $user = $profile->user->first();
        $careerLevel = $profile->careerLevel->first();
        $city = $profile->city->first();
        $country = $profile->country->first();
        return view('profiles.show', compact('user','profile', 'careerLevel','city','country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $countries = Country::all();
        $cities = City::all();
        $careerLevels = CareerLevel::all();
        return view('profiles.edit' , compact('profile','countries','cities','careerLevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Profile $profile)
    {
        $profile->update($request->all());
        return redirect(route('profiles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return back();
    }
}
