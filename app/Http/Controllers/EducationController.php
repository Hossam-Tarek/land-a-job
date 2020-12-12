<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\User;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::all();
        return view('educations.index')
            ->with('educations', $educations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('educations.create');
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
            'user_email' => 'required|exists:users,email',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'organization' => 'required|string',
            'grade' => 'required|string|max:64',
            'degree' => 'required|string',
            'field_of_study' => 'required|string',
            'description' => 'nullable',
        ]);

        $user_email = request("user_email");
        $user_id = User::select('id')->where('email',$user_email)->first();

        $start_date = request("start_date");
        $end_date = request("end_date");
        $organization = request("organization");
        $grade = request("grade");
        $degree = request("degree");
        $field_of_study = request("field_of_study");
        $description = request("description");

        Education::create([
            "user_id"=>($user_id)->id,
            "start_date"=>$start_date,
            "end_date" => $end_date,
            "organization" => $organization,
            "grade" => $grade,
            "degree" => $degree,
            "field_of_study" => $field_of_study,
            "description" => $description,
        ]);
        return redirect(route('educations.index'));
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
        $educations = Education::find($id);
        return view('educations.edit');
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
        $educations = Education::find($id);
        $this->validate(request(),
        [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'organization' => 'required|string',
            'grade' => 'required|string|max:64',
            'degree' => 'required|string',
            'field_of_study' => 'required|string',
            'description' => 'nullable',
        ]);

        $start_date = request("start_date");
        $end_date = request("end_date");
        $organization = request("organization");
        $grade = request("grade");
        $degree = request("degree");
        $field_of_study = request("field_of_study");
        $description = request("description");

        Education::update([
            "start_date"=>$start_date,
            "end_date" => $end_date,
            "organization" => $organization,
            "grade" => $grade,
            "degree" => $degree,
            "field_of_study" => $field_of_study,
            "description" => $description,
        ]);
        return redirect(route('educations.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educations =  Education::find($id);
        $educations->delete();
        return back();
    }

    //get all educations of user
    public function userEducation($user_id){
        $educations = Education::where('user_id',$user_id)->get();
        return view('educations.userEducations',compact('educations'));
    }
}
