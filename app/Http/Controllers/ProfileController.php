<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersId = User::select('id' , 'email')->get();
        $countriesId = Country::select('id' , 'name')->get();
        $citiesId = City::select('id' , 'name')->get();
        $careerLevelId = CareerLevel::select('id' , 'name')->get();
        return view('profiles.create' , compact('usersId','countriesId','citiesId','careerLevelId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
        [
            'user_id' => 'required|exists:users,id',
            'career_level_id' => 'required|exists:career_levels,id',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|cities:states,id',
            'gender' => 'required',
            'min_salary' => 'required|integer',
            'military_status' => 'required',
            'education_level' => 'required',
            'job_title' => 'required',
            'cv' => 'nullable',
        ]);

    $user_id = request("user_id");
    $career_level_id = request("career_level_id");
    $country_id = request("country_id");
    $city_id = request("city_id");
    $gender = request("gender");
    $min_salary = request("min_salary");
    $military_status = request("military_status");
    $education_level = request("education_level");
    $job_title = request("job_title");
    $cv = request("cv");

    Profile::create([
        "user_id"=>$user_id,
        "career_level_id"=>$career_level_id,
        "country_id" => $country_id,
        "city_id" => $city_id,
        "gender" => $gender,
        "min_salary" => $min_salary,
        "military_status" => $military_status,
        "education_level" => $education_level,
        "job_title" => $job_title,
        "cv" => $cv
    ]);
    return redirect(route('profile.show',request("user_id")));
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
    public function edit($id)
    {
        $profile = Profile::find($id);
        $countriesId = Country::select('id' , 'name')->get();
        $citiesId = City::select('id' , 'name')->get();
        $careerLevelId = CareerLevel::select('id' , 'name')->get();
        return view('profiles.edit' , compact('profile','countriesId','citiesId','careerLevelId'));
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
        $profile = Profile::find($id);

        $this->validate(request(),
        [
            'career_level_id' => 'required|exists:career_levels,id',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|cities:states,id',
            'gender' => 'required',
            'min_salary' => 'required|integer',
            'military_status' => 'required',
            'education_level' => 'required',
            'job_title' => 'required',
            'cv' => 'nullable',
        ]);

        $career_level_id = request("career_level_id");
        $country_id = request("country_id");
        $city_id = request("city_id");
        $gender = request("gender");
        $min_salary = request("min_salary");
        $military_status = request("military_status");
        $education_level = request("education_level");
        $job_title = request("job_title");
        $cv = request("cv");

        $profile ->update([
            "career_level_id"=>$career_level_id,
            "country_id" => $country_id,
            "city_id" => $city_id,
            "gender" => $gender,
            "min_salary" => $min_salary,
            "military_status" => $military_status,
            "education_level" => $education_level,
            "job_title" => $job_title,
            "cv" => $cv
        ]);
        return redirect(route('profile.show',$profile->user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile =  Profile::find($id);
        $profile->delete();
        return back();
    }
}
