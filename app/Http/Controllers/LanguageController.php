<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\User;



class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('languages.index')
            ->with('languages', $languages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.create');
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
            'name' => 'required',
            'proficiency' => 'required',
        ]);

        $user_email = request("user_email");
        $user_id = User::select('id')->where('email',$user_email)->first();

        $name = request("name");
        $proficiency = request("proficiency");

        Language::create([
            "user_id"=>($user_id)->id,
            "name"=>$career_level_id,
            "proficiency" => $country_id,
        ]);
        return redirect(route('languages.index'));
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
        $languages = Language::find($id);
        return view('languages.edit');
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
        $languages = Language::find($id);
        $this->validate(request(),
        [
            'name' => 'required',
            'proficiency' => 'required',
        ]);
        
        $name = request("name");
        $proficiency = request("proficiency");

        $languages ->update([
            "name"=>$name,
            "proficiency"=>$proficiency
        ]);
        return view('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $languages =  Language::find($id);
        $languages->delete();
        return back();
    }
    //get all languages of user
    public function userLanguages($user_id){
        $languages = Language::where('user_id',$user_id)->get();
        return view('languages.userLanguages',compact('languages'));
    }
}
